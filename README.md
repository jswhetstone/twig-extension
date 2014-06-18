jswhetstone/twig-extension
==============
Some useful Twig functions for context-relevant class rendering.


`{{ getActiveClass('/some/page') }}`
> Will return 'active' (without quotes) if the current URI contains the string specified.
> Good for rendering the active state on Bootstrap nav elements.
> Pass an empty string '' to check for root.


`{{ getPageClasses() }}`
> Will return a class-ready string representation of the current URI.
> Each directory in the hierarchy is represented by a separate class.
> The root directory will return 'home' (without quotes).


license
-------

This code is licensed under [WTFPL](http://wtfpl.net)
