<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'ArticleController' => $baseDir . '/app/controllers/ArticleController.php',
    'Backend\\AuthController' => $baseDir . '/app/controllers/backend/AuthController.php',
    'Backend\\BaseController' => $baseDir . '/app/controllers/backend/BaseController.php',
    'Backend\\CategoryController' => $baseDir . '/app/controllers/backend/CategoryController.php',
    'Backend\\CommentController' => $baseDir . '/app/controllers/backend/CommentController.php',
    'Backend\\HomeController' => $baseDir . '/app/controllers/backend/HomeController.php',
    'Backend\\LinkController' => $baseDir . '/app/controllers/backend/LinkController.php',
    'Backend\\PostController' => $baseDir . '/app/controllers/backend/PostController.php',
    'Backend\\SystemController' => $baseDir . '/app/controllers/backend/SystemController.php',
    'Backend\\UserController' => $baseDir . '/app/controllers/backend/UserController.php',
    'Category' => $baseDir . '/app/models/Category.php',
    'Comment' => $baseDir . '/app/models/Comment.php',
    'Commentmeta' => $baseDir . '/app/models/Commentmeta.php',
    'Cooper\\Wechat\\Controllers\\WechatController' => $vendorDir . '/cooper/wechat/src/controllers/WechatController.php',
    'CreateCategories' => $baseDir . '/app/database/migrations/2014_02_18_142241_create_categories.php',
    'CreateCommentmeta' => $baseDir . '/app/database/migrations/2014_02_18_143404_create_commentmeta.php',
    'CreateComments' => $baseDir . '/app/database/migrations/2014_02_18_142151_create_comments.php',
    'CreateLinks' => $baseDir . '/app/database/migrations/2014_02_18_142142_create_links.php',
    'CreateOptions' => $baseDir . '/app/database/migrations/2014_02_18_142223_create_options.php',
    'CreatePasswordRemindersTable' => $baseDir . '/app/database/migrations/2014_02_22_084919_create_password_reminders_table.php',
    'CreatePostmeta' => $baseDir . '/app/database/migrations/2014_02_18_143404_create_postmeta.php',
    'CreatePosts' => $baseDir . '/app/database/migrations/2014_02_18_142133_create_posts.php',
    'CreateTermRelationships' => $baseDir . '/app/database/migrations/2014_02_18_142305_create_term_relationships.php',
    'CreateUsermeta' => $baseDir . '/app/database/migrations/2014_02_18_142341_create_usermeta.php',
    'CreateUsers' => $baseDir . '/app/database/migrations/2014_02_18_142111_create_users.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'HomeController' => $baseDir . '/app/controllers/HomeController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'Link' => $baseDir . '/app/models/Link.php',
    'Option' => $baseDir . '/app/models/Option.php',
    'Post' => $baseDir . '/app/models/Post.php',
    'PostController' => $baseDir . '/app/controllers/PostController.php',
    'Postmeta' => $baseDir . '/app/models/Postmeta.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'TermRelation' => $baseDir . '/app/models/TermRelation.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'Tree' => $baseDir . '/app/library/Tree.php',
    'User' => $baseDir . '/app/models/User.php',
    'UserTableSeeder' => $baseDir . '/app/database/seeds/UserTableSeeder.php',
    'Usermeta' => $baseDir . '/app/models/Usermeta.php',
    'Whoops\\Module' => $vendorDir . '/filp/whoops/src/deprecated/Zend/Module.php',
    'Whoops\\Provider\\Zend\\ExceptionStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
    'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
);
