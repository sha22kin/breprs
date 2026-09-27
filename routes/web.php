<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/',[WelcomeController::class,'index'])->name('index');
Route::get('/about',[WelcomeController::class,'about'])->name('about');
Route::get('/about-us',[WelcomeController::class,'about'])->name('aboutUs');
Route::get('/ceo',[WelcomeController::class,'ceo'])->name('ceo');
Route::get('/campaigns',[WelcomeController::class,'campaigns'])->name('campaigns');
Route::get('/campaign-details/{slug?}',[WelcomeController::class,'campaignDetails'])->name('campaignDetails');
Route::get('/campaign/{slug}',[WelcomeController::class,'campaignDetails'])->name('campaignView');
Route::get('/projects',[WelcomeController::class,'projects'])->name('projects');
Route::get('/project-details/{slug?}',[WelcomeController::class,'projectDetails'])->name('projectDetails');
Route::get('/project/{slug}',[WelcomeController::class,'projectDetails'])->name('projectView');
Route::get('/news',[WelcomeController::class,'news'])->name('news');
Route::get('/news-details/{slug?}',[WelcomeController::class,'newsDetails'])->name('newsDetails');
Route::get('/news/{slug}',[WelcomeController::class,'newsDetails'])->name('newsView');
Route::get('/stories',[WelcomeController::class,'stories'])->name('stories');
Route::get('/story-details/{slug?}',[WelcomeController::class,'storyDetails'])->name('storyDetails');
Route::get('/story/{slug}',[WelcomeController::class,'storyDetails'])->name('storyView');
Route::get('/members',[WelcomeController::class,'members'])->name('members');
Route::get('/volunteer',[WelcomeController::class,'volunteer'])->name('volunteer');
Route::post('/volunteer-apply',[WelcomeController::class,'volunteerApply'])->name('volunteerApply');
Route::get('/contact',[WelcomeController::class,'contact'])->name('contact');
Route::get('/contact-us',[WelcomeController::class,'contact'])->name('contactUs');

Route::get('/image-view',[WelcomeController::class,'imageView'])->name('imageView');
Route::get('/image/{template?}/{image?}',[WelcomeController::class,'imageView2'])->name('imageView2');
Route::get('/sitemap.xml',[WelcomeController::class,'siteMapXml'])->name('siteMapXml');
Route::get('/search',[WelcomeController::class,'search'])->name('search');
Route::post('/contact-mail',[WelcomeController::class,'contactMail'])->name('contactMail');
Route::post('/subscribe',[WelcomeController::class,'subscribe'])->name('subscribe');
Route::get('/switch/{lang?}',[WelcomeController::class,'language'])->name('language');
Route::get('/geo/filter/{id}',[WelcomeController::class,'geo_filter'])->name('geo_filter');

Route::get('/service/category/{slug}',[WelcomeController::class,'serviceCategory'])->name('serviceCategory');
Route::get('/service/{slug}',[WelcomeController::class,'serviceView'])->name('serviceView');


Route::get('/blog/category/{slug}',[WelcomeController::class,'blogCategory'])->name('blogCategory');
Route::get('/blog/author/{id}/{slug}',[WelcomeController::class,'blogAuthor'])->name('blogAuthor');
Route::get('/blog/tag/{slug}',[WelcomeController::class,'blogTag'])->name('blogTag');
Route::get('/blog/archives/{slug}',[WelcomeController::class,'blogArchives'])->name('blogArchives');
Route::get('/blog/search',[WelcomeController::class,'blogSearch'])->name('blogSearch');
Route::get('/blog/{slug}',[WelcomeController::class,'blogView'])->name('blogView');
Route::post('/blog-comments/{slug}',[WelcomeController::class,'blogComments'])->name('blogComments');

//Auth Route Start

Route::any('/login',[AuthController::class,'login'])->name('login');
Route::any('/forgot-password',[AuthController::class,'forgotPassword'])->name('forgotPassword');
Route::get('/reset-password/{token}',[AuthController::class,'resetPassword'])->name('resetPassword');
Route::post('/reset-password-check',[AuthController::class,'resetPasswordCheck'])->name('resetPasswordCheck');
Route::any('/register',[AuthController::class,'register'])->name('register');
Route::any('/signup',[AuthController::class,'register'])->name('signup');
Route::post('/log-out',[AuthController::class,'logout'])->name('logout');


//Customer Route Group Start

Route::group(['prefix'=>'customer', 'as'=>'customer.','middleware'=>['auth','role:customer']], function(){

Route::get('/dashboard',[CustomerController::class,'dashboard'])->name('dashboard');

});


// Admin Route Group Start

Route::group(['prefix'=>'admin', 'as'=>'admin.','middleware'=>['auth','role:admin','permission']], function(){

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::any('/my-profile',[AdminController::class,'myProfile'])->name('myProfile');

Route::get('/editor/{type}/{id}',[AdminController::class,'contentEditor'])->name('contentEditor');
Route::any('/editor-action/{action}/{id?}',[AdminController::class,'contentEditorAction'])->name('contentEditorAction');

// Medies Library Route
Route::get('/medies',[AdminController::class,'medies'])->name('medies');
Route::post('/medies-file-upload',[AdminController::class,'mediesFileUpload'])->name('mediesFileUpload');
Route::post('/medies/create',[AdminController::class,'mediesCreate'])->name('mediesCreate');
Route::match(['get','post'],'/medies/edit/{id}',[AdminController::class,'mediesEdit'])->name('mediesEdit');
Route::get('/medies/delete/{id}',[AdminController::class,'mediesDelete'])->name('mediesDelete');
// Medies Library Route End


//Page Management
Route::get('/pages',[AdminController::class,'pages'])->name('pages');
Route::any('/pages/{action}/{id?}',[AdminController::class,'pagesAction'])->name('pagesAction');
//Page Management End

// Posts Comments Route End
Route::get('/posts/comments/all',[PostsController::class,'postsCommentsAll'])->name('postsCommentsAll');
Route::get('/posts/comments/post/{id}',[PostsController::class,'postsComments'])->name('postsComments');
Route::any('/posts/comments/{action}/{id}',[PostsController::class,'postsCommentsAction'])->name('postsCommentsAction');
// Posts Comments Route End

// Posts Categories Route
Route::get('/posts/categories',[PostsController::class,'postsCategories'])->name('postsCategories');
Route::any('/posts/categories/{action}/{id?}',[PostsController::class,'postsCategoriesAction'])->name('postsCategoriesAction');
// Posts Categories Route End

// Posts Tags Route
Route::get('/posts/tags',[PostsController::class,'postsTags'])->name('postsTags');
Route::any('/posts/tags/{action}/{id?}',[PostsController::class,'postsTagsAction'])->name('postsTagsAction');
// Posts Tags Route End

// Posts Route
Route::get('/posts',[PostsController::class,'posts'])->name('posts');
Route::any('/posts/{action}/{id?}',[PostsController::class,'postsAction'])->name('postsAction');
// Posts Route End



// Services Categories Route
Route::get('/services/categories',[AdminController::class,'servicesCategories'])->name('servicesCategories');
Route::any('/services/categories/{action}/{id?}',[AdminController::class,'servicesCategoriesAction'])->name('servicesCategoriesAction');
// Services Categories Route End

//Services Management
Route::get('/services',[AdminController::class,'services'])->name('services');
Route::any('/services/{action}/{id?}',[AdminController::class,'servicesAction'])->name('servicesAction');
//Services Management End

// Projects Management
Route::get('/projects',[AdminController::class,'projects'])->name('projects');
Route::any('/projects/{action}/{id?}',[AdminController::class,'projectsAction'])->name('projectsAction');
// Projects Management End

// Success Stories Management
Route::get('/stories',[AdminController::class,'stories'])->name('stories');
Route::any('/stories/{action}/{id?}',[AdminController::class,'storiesAction'])->name('storiesAction');
// Success Stories Management End

// Volunteer Applications Management
Route::get('/volunteers',[AdminController::class,'volunteers'])->name('volunteers');
Route::get('/volunteers/view/{id}',[AdminController::class,'volunteerView'])->name('volunteerView');
Route::any('/volunteers/{action}/{id?}',[AdminController::class,'volunteersAction'])->name('volunteersAction');
// Volunteer Applications Management End

// Members Management
Route::get('/members',[AdminController::class,'adminMembers'])->name('members');
Route::any('/members/{action}/{id?}',[AdminController::class,'adminMembersAction'])->name('membersAction');
// Members Management End

// Posts Route
Route::get('/clients',[AdminController::class,'clients'])->name('clients');
Route::any('/clients/{action}/{id?}',[AdminController::class,'clientsAction'])->name('clientsAction');
// Posts Route End

// Brands Route
Route::get('/brands',[AdminController::class,'brands'])->name('brands');
Route::any('/brands/{action}/{id?}',[AdminController::class,'brandsAction'])->name('brandsAction');
// Brands Route End

// Slider Route
Route::get('/sliders',[AdminController::class,'sliders'])->name('sliders');
Route::any('/sliders/{action}/{id?}',[AdminController::class,'slidersAction'])->name('slidersAction');
Route::any('/sliders/slide/{action}/{id}',[AdminController::class,'slideAction'])->name('slideAction');
// Slider Route End

// Gallery Route
Route::get('/galleries',[AdminController::class,'galleries'])->name('galleries');
Route::any('/galleries/{action}/{id?}',[AdminController::class,'galleriesAction'])->name('galleriesAction');
// Gallery Route End


// Theme Route
Route::get('/theme-setting',[AdminController::class,'themeSetting'])->name('themeSetting');
// Theme Route End

// Menus Route
Route::get('/menus',[MenusController::class,'menus'])->name('menus');
Route::any('/menus/config/{action}/{id?}',[MenusController::class,'menusAction'])->name('menusAction');
Route::post('/menus/items/post/{id}',[MenusController::class,'menusItemsPost'])->name('menusItemsPost');
Route::any('/menus/items/{action}/{id}',[MenusController::class,'menusItemsAction'])->name('menusItemsAction');
// Menus Route End


//User Management
Route::get('/users/admin/',[AdminController::class,'usersAdmin'])->name('usersAdmin');
Route::any('/users/admin/{action}/{id?}',[AdminController::class,'usersAdminAction'])->name('usersAdminAction');

Route::get('/users/customer/',[AdminController::class,'usersCustomer'])->name('usersCustomer');
Route::any('/users/customer/{action}/{id?}',[AdminController::class,'usersCustomerAction'])->name('usersCustomerAction');

Route::get('/users/roles',[AdminController::class,'userRoles'])->name('userRoles');
Route::any('/users/roles/{action}/{id?}',[AdminController::class,'userRoleAction'])->name('userRoleAction');

Route::get('/subscribes',[AdminController::class,'subscribes'])->name('subscribes');



// Apps Setting
Route::get('/setting/{type}',[AdminController::class,'setting'])->name('setting');
Route::post('/setting/{type}/update',[AdminController::class,'settingUpdate'])->name('settingUpdate');

});

// Catch-all Dynamic Page & Post View Route (must be at the end of routes)
Route::get('/{slug}',[WelcomeController::class,'pageView'])->name('pageView');