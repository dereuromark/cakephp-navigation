## Ideas and TODOs

### Rendering
Decide:
- https://github.com/dereuromark/cakephp-menu
- https://github.com/icings/menu

### visibility
It may be useful to hide some links in specific situations.
For that we could add the visibility flag (tinyint 2 as bitmask) where you can tell on which template the link should be visible.

    visibility:
        menu: true
        breadcrumbs: false
        sitemap: true

### Translations

How to deal with this?

### Custom data

Every link can contain additional data which can be later used eg. in your custom templates?
Icons, attributes, ...

### Authorization

Sometimes you may want to hide some links based on custom rules.

