<?php

namespace Drupal\codesnippet\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\ckeditor\CKEditorPluginButtonsInterface;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "codeTag" plugin.
 *
 * @CKEditorPlugin(
 *   id = "codeTag",
 *   label = @Translation("CodeTag"),
 *   module = "ckeditor"
 * )
 */
class CodeTag extends CKEditorPluginBase implements CKEditorPluginButtonsInterface {
  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return base_path() . 'libraries/codeTag/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return array();
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    return array(
      'Code' => array(
        'label' => t('CodeTag'),
        'image' => base_path() . 'libraries/codeTag/icons/code.png',
      ),
    );
  }

}
