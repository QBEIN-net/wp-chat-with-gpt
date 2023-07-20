<?php

/**
 * Copyright (c) 2022-present Tectalic (https://tectalic.com)
 *
 * For copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * Please see the README.md file for usage instructions.
 */

declare(strict_types=1);

namespace Tectalic\OpenAi\Models\Moderations;

use Tectalic\OpenAi\Models\AbstractModel;

final class CreateResponseResultsItemCategories extends AbstractModel
{
    /**
     * List of properties names that are different in this model compared to the API.
     *
     * Array key is this model's property name, array value is the API's property name.
     */
    protected const MAPPED = [
        'hateThreatening' => 'hate/threatening',
        'selfHarm' => 'self-harm',
        'sexualMinors' => 'sexual/minors',
        'violenceGraphic' => 'violence/graphic',
    ];

    /**
     * List of required property names.
     *
     * These properties must all be set when this Model is instantiated.
     */
    protected const REQUIRED = [
        'hate',
        'hateThreatening',
        'selfHarm',
        'sexual',
        'sexualMinors',
        'violence',
        'violenceGraphic',
    ];

    /** @var bool */
    public $hate;

    /** @var bool */
    public $hateThreatening;

    /** @var bool */
    public $selfHarm;

    /** @var bool */
    public $sexual;

    /** @var bool */
    public $sexualMinors;

    /** @var bool */
    public $violence;

    /** @var bool */
    public $violenceGraphic;
}
