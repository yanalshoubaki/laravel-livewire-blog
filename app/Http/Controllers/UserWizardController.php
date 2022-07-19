<?php

namespace App\Http\Controllers;

use App\Steps\User\EmailStep;
use App\Steps\User\NameStep;
use App\Steps\User\PhotoStep;
use Ycs77\LaravelWizard\Wizardable;

class UserWizardController extends Controller
{
    use Wizardable;

    /**
     * The wizard name.
     *
     * @var string
     */
    protected $wizardName = 'user';

    /**
     * The wizard title.
     *
     * @var string
     */
    protected $wizardTitle = 'User';

    /**
     * The wizard options.
     *
     * @var array
     */
    protected $wizardOptions = [];

    /**
     * The wizard steps instance.
     *
     * @var array
     */
    protected $steps = [
        NameStep::class,
        EmailStep::class,
        PhotoStep::class,
    ];
}
