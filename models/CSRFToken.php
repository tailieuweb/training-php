<?php
  class CSRFToken {
    public static function GenerateToken() {
      $token = base64_encode(md5(time()) . rand());
      return $token;
    }

    public static function CompareTokens($field_token, $session_token) {
      if ($field_token === $session_token) {
        return true;
        die();
      }
      return false;
    }

  }
