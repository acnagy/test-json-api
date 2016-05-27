<?php namespace Limoncello\JsonApi\Contracts\Http;

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

use Interop\Container\ContainerInterface;
use Neomerx\JsonApi\Contracts\Encoder\Parameters\EncodingParametersInterface;
use Neomerx\JsonApi\Contracts\Http\ResponsesInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * @package Limoncello\JsonApi
 */
interface ControllerInterface
{
    /** Handler's method name (could be used in routing table) */
    const METHOD_INDEX = 'index';

    /** Handler's method name (could be used in routing table) */
    const METHOD_CREATE = 'create';

    /** Handler's method name (could be used in routing table) */
    const METHOD_READ = 'read';

    /** Handler's method name (could be used in routing table) */
    const METHOD_UPDATE = 'update';

    /** Handler's method name (could be used in routing table) */
    const METHOD_DELETE = 'delete';

    /**
     * @param array                  $routeParams
     * @param ContainerInterface     $container
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public static function index(array $routeParams, ContainerInterface $container, ServerRequestInterface $request);

    /**
     * @param array                  $routeParams
     * @param ContainerInterface     $container
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public static function create(array $routeParams, ContainerInterface $container, ServerRequestInterface $request);

    /**
     * @param array                  $routeParams
     * @param ContainerInterface     $container
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public static function read(array $routeParams, ContainerInterface $container, ServerRequestInterface $request);

    /**
     * @param array                  $routeParams
     * @param ContainerInterface     $container
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public static function update(array $routeParams, ContainerInterface $container, ServerRequestInterface $request);

    /**
     * @param array                  $routeParams
     * @param ContainerInterface     $container
     * @param ServerRequestInterface $request
     *
     * @return ResponseInterface
     */
    public static function delete(array $routeParams, ContainerInterface $container, ServerRequestInterface $request);

    /**
     * @param ContainerInterface               $container
     * @param ServerRequestInterface           $request
     * @param EncodingParametersInterface|null $parameters
     *
     * @return ResponsesInterface
     */
    public static function createResponses(
        ContainerInterface $container,
        ServerRequestInterface $request,
        EncodingParametersInterface $parameters = null
    );
}
