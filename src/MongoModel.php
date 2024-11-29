<?php

namespace Edd\PearLeafOrm;

use Edd\PearLeafOrm\Attributes\BinaryField;
use Edd\PearLeafOrm\Attributes\Document;
use Edd\PearLeafOrm\Attributes\Field;
use MongoDB\BSON\Persistable;
use MongoDB\Collection;
use ReflectionClass;
use WeakMap;

/**
 * An ODM-like Model.
 *
 * @since 2.0.0
 */
abstract class MongoModel implements Persistable
{
    protected \MongoDB\BSON\ObjectId $id;

    protected Collection $collection;

    private string $databaseName;

    private string $collectionName;

    /**
     * @var ReflectionClass<\Edd\PearLeafOrm\MongoModel>
     */
    private ReflectionClass $reflector;

    /**
     * @var array<mixed>
     */
    private array $fields = [];

    private WeakMap $fieldMap;

    public function __construct(private readonly ConnectionManager $connectionManager)
    {
        $this->fieldMap = new WeakMap();
        $this->reflector = new ReflectionClass(get_class($this));
        $this->getAttributeValues();
        $this->setCollection();
    }

    /**
     * @see https://www.php.net/manual/en/mongodb-bson-serializable.bsonserialize.php
     *
     * @return array<mixed>
     */
    public function bsonSerialize(): array {
        return $this->fields;
    }

    /**
     * @param array<mixed> $data
     * @see https://www.php.net/manual/en/mongodb-bson-unserializable.bsonunserialize.php
     *
     * @return void
     */
    public function bsonUnserialize(array $data): void {
        // TODO
    }

    /**
     * Converts model to array
     *
     * @return array<mixed>
     */
    public function toArray(): array
    {
        return [];
    }

    /**
     * Create a new document based on model.
     *
     * @return void
     */
    public function create() : void
    {
        $this->collection->insertOne($this);
    }

    /**
     * Set collection model will be based of.
     *
     * @return void
     */
    private function setCollection(): void
    {
        $this->collection = $this->connectionManager->mongo->selectCollection($this->databaseName, $this->collectionName);
    }

    private function getPropertyAttributes(): void
    {
        foreach ($this->reflector->getProperties() as $property) {
            foreach ($property->getAttributes() as $attribute) {
                $attrVals = $attribute->getArguments();

                if ($attribute->getName() !== Field::class) {
                    $fieldName = $attrVals[1] ?? $property->getName();

                    $this->fieldMap[$fieldName] = [
                        'fieldType' => $attrVals[0],
                        'fieldValue' => $property->getValue(),
                    ];
                }

                if ($attribute->getName() !== BinaryField::class) {
                    continue;
                }
            }
            //break;
        }
    }

    /**
     * Process our attributes to help aid model.
     *
     * @return void
     */
    private function getAttributeValues(): void
    {
        foreach ($this->reflector->getAttributes() as $attribute) {
            if ($attribute->getName() !== Document::class) {
                continue;
            }

            $vals = $attribute->getArguments();

            $this->collectionName = $vals[0] ?? get_class($this);
            $this->databaseName = $vals[1];
            break;
        }
    }
}