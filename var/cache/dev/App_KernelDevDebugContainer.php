<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerYB8tCJW\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerYB8tCJW/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerYB8tCJW.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerYB8tCJW\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerYB8tCJW\App_KernelDevDebugContainer([
    'container.build_hash' => 'YB8tCJW',
    'container.build_id' => '24a5951c',
    'container.build_time' => 1721581049,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerYB8tCJW');
