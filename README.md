# Lively: An Omeka Classic Theme

This is an Omeka Classic theme that offers some custom options and a clean design.
![Lively Theme](https://github.com/omeka/theme-lively/blob/main/theme.jpg?raw=true)

## Installation

For basic out-of-the-box use of the theme, follow the [Omeka Classic User Manual instructions for installing themes](https://omeka.org/classic/docs/Admin/Appearance/Themes/#installing-a-theme). 

For more advanced use, such as customizing the theme with Sass, you'll need to install the tools with [NodeJS](https://nodejs.org/en/) (0.12 or greater). Navigate to your theme directory and run `npm install`.

## Theme settings

### Theme's Primary Color
The color to be used as the theme's primary color. The default value is #d62d6a.

### Theme's Secondary Color
The color to be used as the theme's secondary color. The default value is #4D1068.

### Theme's Accent Color
The color to be used as the theme's accent color for links and accents. The default value is #0a4f9e.

### Theme's complementary Color
The color to use on decorative shapes. The default value is #F0B247.

### Header Layout
- Inline logo and menu
- Centered logo and menu

### Logo
A custom logo (SVG, JPG, PNG)

### Banner
- Banner image
- Heading
- Description
- Content position
- Banner width
- Banner height
- Banner height for mobile devices
- Banner image vertical position within the wrapper
- Banner image horizontal position within the wrapper

### Footer
- Footer Logo
- Footer Site description
- Footer Menu
- Footer Content
- Footer Copyright

### Homepage Settings
- Homepage Text
- Featured Records Title
- Main Featured Record Type
- Second Featured Record Type
- Third Featured Record Type
- First Recent Records Set
  - Type
  - Title
  - Quantity
- Second Recent Records Set
  - Type
  - Title
  - Quantity
- Third Recent Records Set
  - Type
  - Title
  - Quantity
- Show the most popular tags in the Homepage
- Most popular tags title
- Most popular tags quantity

### Social Media
- Facebook
- Twitter
- LinkedIn
- Instagram
- Youtube
- Mastodon

### Image Settings
- Decorative border for Media

### Record Tags
- Show tags based on Record Type, Record Tags or Item Type

### Browse Settings
- Layout for Browse Pages
- Truncate Body Property

## Customizing the Theme

If you want to customize the site with your own CSS, the [CSS Editor](https://omeka.org/classic/plugins/CSSEditor/) module allows site administrators to write style overrides.

For advanced CSS and Sass users, this theme includes variables and mixins for managing and extending many styles.

### Sass Tasks

Run these commands within the theme's root directory.

* **npm run start**: While this task runs, it watches for changes to sass files and recompiles the CSS.
* **gulp css**: This is the one-off task for compiling the current Sass/CSS.
* **gulp css:watch**: This task watches for changes in the Sass, then compiles the CSS.

### Sass File Structure

```bash
sass
    ├── abstracts
    │   ├── mixins
    │   └── variables
    │       ├── breakpoints
    │       ├── colors
    │       ├── layout
    │       └── typography
    ├── base
    │   ├── elements
    │   │   ├── body
    │   │   ├── buttons
    │   │   ├── caption
    │   │   ├── fields
    │   │   ├── hr
    │   │   ├── icons
    │   │   ├── language-tag
    │   │   ├── links
    │   │   ├── lists
    │   │   ├── media
    │   │   ├── resource-description
    │   │   ├── resource-tag
    │   │   ├── tables
    │   │   ├── titles
    │   │   └── tooltip
    │   ├── layout
    │   │   ├── layout
    │   │   └── regions
    │   └── typography
    │       ├── copy
    │       ├── headings
    │       └── typography
    ├── components
    │   ├── advanced-search
    │   ├── banner
    │   ├── breadcrumbs
    │   ├── exhibit-blocks
    │   ├── featured-records
    │   ├── footer
    │   ├── header
    │   ├── mapping
    │   ├── metadata
    │   ├── navigation
    │   ├── output-formats
    │   ├── pagination
    │   ├── resources
    │   │   ├── browse-controls
    │   │   ├── filters
    │   │   ├── items-nav
    │   │   ├── recent
    │   │   ├── resource-grid
    │   │   ├── resource-list
    │   │   ├── sort-links
    │   ├── tag-cloud
    │   └── timeline
    ├── generic
    │   ├── box-sizing
    │   └── normalize
    ├── utilities
    │   ├── accessibility
    │   ├── alignments
    │   ├── clearfix
    │   └── utilities
    └── views
        ├── contribution
        ├── login
        └── register
```

## Utility classes
Lively offers a set of predefined utiliy classes that will help you to add styles to certain elements by just assigning them these classes.

You can even combine multiple utility classes.

- `inline`
- `alignleft`
- `alignright`
- `aligncenter`
- `alignfull`
- `alignwide`
- `alignnarrow`
- `textleft`
- `textright`
- `textcenter`
- `clearfix`
- `screen-reader-text`


## Copyright
Lively is Copyright © 2023-present Corporation for Digital Scholarship, Vienna, Virginia, USA http://digitalscholar.org

The Corporation for Digital Scholarship distributes the Omeka source code under the GNU General Public License, version 3 (GPLv3). The full text of this license is given in the license file.

The Omeka name is a registered trademark of the Corporation for Digital Scholarship.

Third-party copyright in this distribution is noted where applicable.

All rights not expressly granted are reserved.
