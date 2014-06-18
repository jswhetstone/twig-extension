<?php
/**
 * Created by Jacob S. Whetstone
 * http://jswhetstone.com
 * License: WTFPL
 * License URI: http://wtfpl.net
 */
namespace JSW\Twig {

    class TwigExtension extends \Twig_Extension
    {
        public function getName()
        {
            return 'jswhetstone';
        }
        public function getFunctions()
        {
            return array(
                new \Twig_SimpleFunction(
                    'getActiveClass',
                    array($this, 'getActiveClass'),
                    array('is_safe' => array('html'))
                ),
                new \Twig_SimpleFunction(
                    'getPageClasses',
                    array($this, 'getPageClasses')
                ),
            );
        }

        /**
         * @param $path
         * @return string 'class="active"' if the requested path is part of the current uri, otherwise empty
         */
        public function getActiveClass($path)
        {
            $uri = $_SERVER['REQUEST_URI'];

            if (FALSE !== strripos ( $uri , $path )
                || empty($path) && $uri === '/')
                return 'active';

            return '';
        }

        /**
         * @return string: class-ready representation of the current uri
         */
        public function getPageClasses()
        {
            $uri =  $_SERVER['REQUEST_URI'];

            $classes = trim(str_replace(
                [' ','_','/'],
                ['-','-',' '],
                $uri));

            if (empty( $classes ))
                $classes = "home";

            return $classes;
        }

    }
}