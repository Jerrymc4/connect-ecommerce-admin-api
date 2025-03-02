<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\{
    UserRepositoryContract, TenantRepositoryContract, RoleRepositoryContract,
    StoreRepositoryContract, ProductRepositoryContract, CategoryRepositoryContract,
    BrandRepositoryContract, InventoryRepositoryContract, PricingRepositoryContract,
    OrderRepositoryContract, OrderItemRepositoryContract, PaymentRepositoryContract,
    CartRepositoryContract, CouponRepositoryContract, CustomerRepositoryContract,
    CustomerAddressRepositoryContract, ShippingMethodRepositoryContract, ShipmentRepositoryContract,
    ReviewRepositoryContract, RatingRepositoryContract, ReportRepositoryContract,
    ActivityLogRepositoryContract
};
use App\Repositories\Eloquent\{
    UserRepository, TenantRepository, RoleRepository,
    StoreRepository, ProductRepository, CategoryRepository,
    BrandRepository, InventoryRepository, PricingRepository,
    OrderRepository, OrderItemRepository, PaymentRepository,
    CartRepository, CouponRepository, CustomerRepository,
    CustomerAddressRepository, ShippingMethodRepository, ShipmentRepository,
    ReviewRepository, RatingRepository, ReportRepository,
    ActivityLogRepository
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(TenantRepositoryContract::class, TenantRepository::class);
        $this->app->bind(RoleRepositoryContract::class, RoleRepository::class);
        $this->app->bind(StoreRepositoryContract::class, StoreRepository::class);
        $this->app->bind(ProductRepositoryContract::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->bind(BrandRepositoryContract::class, BrandRepository::class);
        $this->app->bind(InventoryRepositoryContract::class, InventoryRepository::class);
        $this->app->bind(PricingRepositoryContract::class, PricingRepository::class);
        $this->app->bind(OrderRepositoryContract::class, OrderRepository::class);
        $this->app->bind(OrderItemRepositoryContract::class, OrderItemRepository::class);
        $this->app->bind(PaymentRepositoryContract::class, PaymentRepository::class);
        $this->app->bind(CartRepositoryContract::class, CartRepository::class);
        $this->app->bind(CouponRepositoryContract::class, CouponRepository::class);
        $this->app->bind(CustomerRepositoryContract::class, CustomerRepository::class);
        $this->app->bind(CustomerAddressRepositoryContract::class, CustomerAddressRepository::class);
        $this->app->bind(ShippingMethodRepositoryContract::class, ShippingMethodRepository::class);
        $this->app->bind(ShipmentRepositoryContract::class, ShipmentRepository::class);
        $this->app->bind(ReviewRepositoryContract::class, ReviewRepository::class);
        $this->app->bind(RatingRepositoryContract::class, RatingRepository::class);
        $this->app->bind(ReportRepositoryContract::class, ReportRepository::class);
        $this->app->bind(ActivityLogRepositoryContract::class, ActivityLogRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
