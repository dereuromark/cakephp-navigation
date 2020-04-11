## Navigation Plugin

### Strategies

#### DB only
A lightweight DB only approach.
Very basic, no authorization possible.

#### DB + menu library
DB for GUI, menu library for the template engine/details.
More complex use cases.

- DB => static sitemap (if all are public/visible)
- Library => menu+breadcrumb (incl active item, auth, trans)


### Params
Using HJSON we can easily attach custom attributes/details
- https://github.com/hjson/hjson-php


### Active Items
Maybe deligate to https://github.com/icings/menu/blob/master/docs/index.md#determining-the-active-item ?

