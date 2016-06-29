<?php namespace Limoncello\Tests\JsonApi\Data\Api;

/**
 * Copyright 2015-2016 info@neomerx.com (www.neomerx.com)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

use Doctrine\DBAL\Query\QueryBuilder;
use Limoncello\JsonApi\Api\Crud;
use Limoncello\JsonApi\Contracts\Adapters\PaginationStrategyInterface;
use Limoncello\JsonApi\Contracts\Adapters\RepositoryInterface;
use Limoncello\JsonApi\Contracts\FactoryInterface;
use Limoncello\JsonApi\Contracts\I18n\TranslatorInterface as T;
use Limoncello\Models\Contracts\SchemaStorageInterface;
use Limoncello\Tests\JsonApi\Data\Models\Model;

/**
 * @package Limoncello\Tests
 */
abstract class AppCrud extends Crud
{
    /** Model class */
    const MODEL_CLASS = null;

    /**
     * @inheritdoc
     */
    public function __construct(
        FactoryInterface $factory,
        RepositoryInterface $repository,
        SchemaStorageInterface $modelSchemes,
        PaginationStrategyInterface $paginationStrategy,
        T $translator
    ) {
        parent::__construct(
            $factory,
            static::MODEL_CLASS,
            $repository,
            $modelSchemes,
            $paginationStrategy,
            $translator
        );
    }

    /**
     * @inheritdoc
     */
    protected function filterAttributesOnCreate($modelClass, $attributes)
    {
        $allowedChanges = parent::filterAttributesOnCreate($modelClass, $attributes);

        $allowedChanges[Model::FIELD_CREATED_AT] = date('Y-m-d H:i:s');

        return $allowedChanges;
    }

    /**
     * @inheritdoc
     */
    protected function filterAttributesOnUpdate($modelClass, $attributes)
    {
        $allowedChanges = parent::filterAttributesOnUpdate($modelClass, $attributes);

        $allowedChanges[Model::FIELD_UPDATED_AT] = date('Y-m-d H:i:s');

        return $allowedChanges;
    }

    /**
     * @inheritdoc
     */
    protected function builderSaveRelationshipOnCreate(QueryBuilder $builder)
    {
        $builder = parent::builderSaveRelationshipOnCreate($builder);

        $builder->setValue(Model::FIELD_CREATED_AT, $builder->createNamedParameter(date('Y-m-d H:i:s')));

        return $builder;
    }

    /**
     * @inheritdoc
     */
    protected function builderSaveRelationshipOnUpdate(QueryBuilder $builder)
    {
        $builder = parent::builderSaveRelationshipOnUpdate($builder);

        $builder->setValue(Model::FIELD_CREATED_AT, $builder->createNamedParameter(date('Y-m-d H:i:s')));

        return $builder;
    }
}