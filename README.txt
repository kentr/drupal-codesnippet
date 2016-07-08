CodeSnippet

Installation
============

This module requires the core CKEditor module and also the CodeSnippet plugin from CKEditor.com.

1. Download the plugin from http://ckeditor.com/addon/codesnippet at least version 4.5.6.
2. Place the plugin in the root libraries folder (/libraries).
3. Enable CodeSnippet in the Drupal admin.
4. Configure your WYSIWYG toolbar to include the button.

Basic Usage
===========

After completing the installation steps above, go to the filter format you want to configure (must be using CKEditor).

Drag CodeSnippet icon into the active toolbar, and the config form will appear below with a syntax highlighting style and
supported languages option. By default, all are checked for you. Uncheck ones you won't need, it's optional. This only controls
the options in the dialog window of CKEditor when inserting a code snippet.

Supported Languages
===================

To add new options to the supported languages option in the admin form, you can use a form alter hook within your own custom module to add on:

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_FORM_ID_alter().
 * Add extra languages for CodeSnippet
 * @param $form
 * @param FormStateInterface $form_state
 * @param $form_id
 */
function MYMODULE_form_filter_format_edit_form_alter(&$form, FormStateInterface $form_state, $form_id) {
  if (isset($form['editor']['settings']['subform']['plugins']['codesnippet'])) {
    $form['editor']['settings']['subform']['plugins']['codesnippet']['highlight_languages']['#options']['cpp'] = 'C++';
    $form['editor']['settings']['subform']['plugins']['codesnippet']['highlight_languages']['#options']['d'] = 'D';
    $form['editor']['settings']['subform']['plugins']['codesnippet']['highlight_languages']['#options']['rust'] = 'Rust';
    asort($form['editor']['settings']['subform']['plugins']['codesnippet']['highlight_languages']['#options']);
  }
}

This would add C++, D, and Rust to the list of languages to check off, which will then make them available in the dialog of CKEditor CodeSnippet.

An important thing to note is that the key of the array item needs to match the expected code class for HighlightJS for proper coloring. If you are unsure of the class name, refer to the HighlightJS live demo page and inspect the
codeblock of what you want, and check the class on the code HTML element.

Additionally, you will need to add any new languages to HighlightJS by customizing its build. You can customize the build at https://highlightjs.org/download/

1. Select all the languages you want to support with syntax highlighting and download it.
2. Overwrite /libraries/codesnippet/lib/highlight/highlight.pack.js with this new file.
3. Clear Drupal caches.

Note that code previews syntax highlighting may not look 100% right (in the WYSIWYG), but typically will when viewed on the frontend.

Out of the box, the included version of highlightjs comes with these languages (as defined in config/install/codesnippet.settings.yml):

languages:
  apache: 'Apache'
  bash: 'Bash'
  coffeescript: 'CoffeeScript'
  css: 'CSS'
  dart: 'Dart'
  dockerfile: 'Dockerfile'
  dust: 'Dust'
  gherkin: 'Gherkin'
  go: 'Go'
  haml: 'HAML'
  handlebars: 'Handlebars'
  ini: 'Ini'
  java: 'Java'
  javascript: 'JavaScript'
  json: 'JSON'
  less: 'Less'
  makefile: 'Makefile'
  markdown: 'Markdown'
  nginx: 'Nginx'
  php: 'PHP'
  perl: 'Perl'
  powershell: 'Powershell'
  puppet: 'Puppet'
  python: 'Python'
  ruby: 'Ruby'
  scss: 'SCSS'
  sql: 'SQL'
  twig: 'Twig'
  typescript: 'TypeScript'
  yaml: 'Yaml'
  xml: 'XML'

Note that if you want to highlight HTML code snippets, you need to use the XML option. It works for both.