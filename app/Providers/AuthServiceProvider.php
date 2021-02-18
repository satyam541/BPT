<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Accreditation'      => 'App\Policies\AccreditationPolicy',
        'App\Models\Article'            => 'App\Policies\ArticlePolicy',
        'App\Models\Category'           => 'App\Policies\CategoryPolicy',
        'App\Models\Course'             => 'App\Policies\CoursePolicy',
        'App\Models\CourseElearning'    => 'App\Policies\CourseElearningPolicy',
        'App\Models\Country'            => 'App\Policies\CountryPolicy',
        'App\Models\Enquiry'            => 'App\Policies\EnquiryPolicy',
        'App\Models\Faq'                => 'App\Policies\FaqPolicy',
        'App\Models\Location'           => 'App\Policies\LocationPolicy',
        'App\Models\Order'              => 'App\Policies\OrderPolicy',
        'App\Models\PageDetail'         => 'App\Policies\PageDetailPolicy',
        'App\Models\Permission'         => 'App\Policies\PermissionPolicy',
        'App\Models\Resource'           => 'App\Policies\ResourcePolicy',
        'App\Models\Role'               => 'App\Policies\RolePolicy',
        'App\Models\Schedule'           => 'App\Policies\SchedulePolicy',
        'App\Models\SocialMedia'        => 'App\Policies\SocialMediaPolicy',
        'App\Models\Tag'                => 'App\Policies\TagPolicy',
        'App\Models\Testimonial'        => 'App\Policies\TestimonialPolicy',
        'App\Models\Topic'              => 'App\Policies\TopicPolicy',
        'App\Models\UrlRedirect'        => 'App\Policies\UrlRedirectPolicy',
        'App\Models\Venue'              => 'App\Policies\VenuePolicy',
        'App\User'                      => 'App\Policies\UserPolicy',
        'App\Models\WebsiteDetail'      => 'App\Policies\WebsiteDetailPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
