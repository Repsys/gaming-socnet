<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;

class ShareValidateStatuses
{
    /**
     * The view factory implementation.
     *
     * @var \Illuminate\Contracts\View\Factory
     */
    protected $view;

    /**
     * Create a new error binder instance.
     *
     * @param \Illuminate\Contracts\View\Factory $view
     * @return void
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $errors = $request->session()->get('errors');
        $areErrors = !empty($errors);
        $inputkeys = array_keys($request->all());
        $isValid = [];

        foreach ($inputkeys as $key) {
            if ($areErrors) {
                $isValid[$key] = $errors->has($key) ? 'is-invalid' : 'is-valid';
            } else {
                $isValid[$key] = '';
            }
        }

        $this->view->share(
            'isValid', $isValid
        );

        return $next($request);
    }
}
