<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVmXygZv\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVmXygZv/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerVmXygZv.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerVmXygZv\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerVmXygZv\App_KernelDevDebugContainer([
    'container.build_hash' => 'VmXygZv',
    'container.build_id' => 'f517e174',
    'container.build_time' => 1721598617,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerVmXygZv');
