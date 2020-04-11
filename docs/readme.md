## Navigation Plugin

The idea is to leverage the CakePHP CRUD controller/action pairs to get started and then further custimize your
menus.

### Strategies

#### DB only
A lightweight DB only approach.
Very basic, no authorization possible.

#### DB + menu library
DB for GUI, menu library for the template engine/details.
More complex use cases.

- DB => static sitemap (if all are public/visible)
- Library => menu+breadcrumb (incl active item, auth, trans)

### Getting started
Let's import the status quo.

Use the Shell to initialize your tree from existing controllers/actions:
```
bin/cake navigation init MyTree -t
```
You can use `-p`/`--plugin` as well as `--prefix` to include more routes.

The `-t`/`--template` option is useful to check for templates and only include actions that have one.
You don't want to include items in the menu or breadcrumb you cannot reach without a post link (HTTP POST) instead of normal one.


### Sync
This imports new controllers/actions into an existing navigation tree:

```
bin/cake navigation sync MyTree
```
You can use `-p`/`--plugin` as well as `--prefix` to include more routes.

With `-t`/`--template` you can hide actions without template in case you ran `init` without this option.
This way they are still in the tree, but not visible anymore.

New ones wouldn't be added with this at all. So if you want to add new ones, run it first without, and then with this flag.


### Params
Using HJSON we can easily attach custom attributes/details
- https://github.com/hjson/hjson-php


### Active Items
Maybe deligate to https://github.com/icings/menu/blob/master/docs/index.md#determining-the-active-item ?

