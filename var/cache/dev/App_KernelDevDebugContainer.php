<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container8ptxKkq\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container8ptxKkq/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container8ptxKkq.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container8ptxKkq\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container8ptxKkq\App_KernelDevDebugContainer([
    'container.build_hash' => '8ptxKkq',
    'container.build_id' => '214e8c2e',
    'container.build_time' => 1714561221,
], __DIR__.\DIRECTORY_SEPARATOR.'Container8ptxKkq');
