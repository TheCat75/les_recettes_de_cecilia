<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerU4PCPzm\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerU4PCPzm/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerU4PCPzm.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerU4PCPzm\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerU4PCPzm\App_KernelDevDebugContainer([
    'container.build_hash' => 'U4PCPzm',
    'container.build_id' => 'b2e72391',
    'container.build_time' => 1721603267,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerU4PCPzm');
