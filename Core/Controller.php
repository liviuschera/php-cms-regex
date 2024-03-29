<?php

namespace Core;

/**
 * Base Controller
 */
abstract class Controller
{

   /**
    * Parameters from the matched route
    * @var array
    */
    protected $route_params = [];

    /**
     * Class constructor
     *
     * @param array $route_params Parameters from the route
     * @return void
     */
    public function __construct(array $route_params)
    {
        $this->route_params = $route_params;
    }

    /**
     * Magic method called when a non-existent or inaccessible method is
     * called on an object of this class. Used to execute before and after
     * filter methods on action methods. Action methods will be suffixed with
     * "@Action" in the 'dispatch' method in the Router class.
     *
     * @param string $name Method name
     * @param array $args Arguments passed to the method
     * @return void
     */
    public function __call(string $name, array $args): void
    {
        // $method = $name . 'Action';
        $method = preg_replace('/@Action/', '', $name);

        if (method_exists($this, $method)) {
            if ($this->before()!==false) {
                // call_user_func_array([$this, $method], $args);
                $this->$method(...$args);
                $this->after();
            }
        } else {
            throw new \Exception("Method $method not found in the controller " . get_class($this));
        }
    }

    /**
     * Before filter - called before an action method.
     *
     * @return void
     */
    protected function before(): void
    {
    }

    /**
     * After filter - called after an action method.
     *
     * @return void
     */
    protected function after(): void
    {
    }
}
