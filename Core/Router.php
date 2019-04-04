<?php
/**
 * Class Router
 */

class Router
{
    /**
     * Associative array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from matched route
     *
     * @var array
     */
    protected $params = [];
    
    /**
     * Add a route to the routing table
     *
     * @param string $route The route url
     * @param array $params Parameters (controller, action, etc.)
     *
     * @return void
     */
    public function add(string $route, array $params): void
    {
        $this->routes[$route] = $params;
    }
    
    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params property if a route is found
     *
     * @param string $url
     * @return bool
     */
    public function match(string $url): bool
    {
        foreach ($this->routes as $route => $params) {
            if ($url == $route) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Get the currently matched parameters
     *
     * @return array
     */
    public function getParams():array
    {
        return $this->params;
    }
}
