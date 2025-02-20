<?php

namespace Drupal\basic_auth\Hook;

use Drupal\Core\Url;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Hook\Attribute\Hook;

/**
 * Hook implementations for basic_auth.
 */
class BasicAuthHooks {

  /**
   * Implements hook_help().
   */
  #[Hook('help')]
  public function help($route_name, RouteMatchInterface $route_match) {
    switch ($route_name) {
      case 'help.page.basic_auth':
        $output = '';
        $output .= '<h2>' . t('About') . '</h2>';
        $output .= '<p>' . t('The HTTP Basic Authentication module supplies an <a href="http://en.wikipedia.org/wiki/Basic_access_authentication">HTTP Basic authentication</a> provider for web service requests. This authentication provider authenticates requests using the HTTP Basic Authentication username and password, as an alternative to using Drupal\'s standard cookie-based authentication system. It is only useful if your site provides web services configured to use this type of authentication (for instance, the <a href=":rest_help">RESTful Web Services module</a>). For more information, see the <a href=":hba_do">online documentation for the HTTP Basic Authentication module</a>.', [
          ':hba_do' => 'https://www.drupal.org/documentation/modules/basic_auth',
          ':rest_help' => \Drupal::moduleHandler()->moduleExists('rest') ? Url::fromRoute('help.page', [
            'name' => 'rest',
          ])->toString() : '#',
        ]) . '</p>';
        return $output;
    }
  }

}
