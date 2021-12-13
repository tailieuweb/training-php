<?php

namespace Botble\SocialLogin\Supports;

class SocialService
{
    /**
     * @param string | array $model
     * @return $this
     */
    public function registerModule($model): self
    {
        if (!is_array($model)) {
            $model = [$model];
        }
        config([
            'plugins.social-login.general.supported' => array_merge($this->supportedModules(), $model),
        ]);

        return $this;
    }

    /**
     * @return array
     */
    public function supportedModules()
    {
        return config('plugins.social-login.general.supported', []);
    }

    /**
     * @return array
     */
    public function isSupportedModule(string $model): bool
    {
        return in_array($model, $this->supportedModules());
    }
}
