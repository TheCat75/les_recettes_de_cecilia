<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerTJiQHcY\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerTJiQHcY/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerTJiQHcY.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerTJiQHcY\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerTJiQHcY\App_KernelDevDebugContainer([
    'container.build_hash' => 'TJiQHcY',
    'container.build_id' => '0b5eaee4',
    'container.build_time' => 1721309123,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerTJiQHcY');
