# Diff Details

Date : 2026-02-13 18:49:55

Directory c:\\Users\\jakub\\Desktop\\sklep\\sklep\\public

Total : 54 files,  -545 codes, -128 comments, -180 blanks, all -853 lines

[Summary](results.md) / [Details](details.md) / [Diff Summary](diff.md) / Diff Details

## Files
| filename | language | code | comment | blank | total |
| :--- | :--- | ---: | ---: | ---: | ---: |
| [app/Http/Controllers/AddressController.php](/app/Http/Controllers/AddressController.php) | PHP | -31 | 0 | -6 | -37 |
| [app/Http/Controllers/AdminCategoryController.php](/app/Http/Controllers/AdminCategoryController.php) | PHP | -49 | 0 | -14 | -63 |
| [app/Http/Controllers/AdminController.php](/app/Http/Controllers/AdminController.php) | PHP | -10 | 0 | -4 | -14 |
| [app/Http/Controllers/AdminOrderController.php](/app/Http/Controllers/AdminOrderController.php) | PHP | -26 | 0 | -9 | -35 |
| [app/Http/Controllers/AdminProductController.php](/app/Http/Controllers/AdminProductController.php) | PHP | -106 | 0 | -21 | -127 |
| [app/Http/Controllers/Auth/AuthenticatedSessionController.php](/app/Http/Controllers/Auth/AuthenticatedSessionController.php) | PHP | -28 | -9 | -11 | -48 |
| [app/Http/Controllers/Auth/ConfirmablePasswordController.php](/app/Http/Controllers/Auth/ConfirmablePasswordController.php) | PHP | -28 | -6 | -7 | -41 |
| [app/Http/Controllers/Auth/EmailVerificationNotificationController.php](/app/Http/Controllers/Auth/EmailVerificationNotificationController.php) | PHP | -16 | -3 | -6 | -25 |
| [app/Http/Controllers/Auth/EmailVerificationPromptController.php](/app/Http/Controllers/Auth/EmailVerificationPromptController.php) | PHP | -15 | -3 | -4 | -22 |
| [app/Http/Controllers/Auth/NewPasswordController.php](/app/Http/Controllers/Auth/NewPasswordController.php) | PHP | -41 | -14 | -8 | -63 |
| [app/Http/Controllers/Auth/PasswordController.php](/app/Http/Controllers/Auth/PasswordController.php) | PHP | -21 | -3 | -6 | -30 |
| [app/Http/Controllers/Auth/PasswordResetLinkController.php](/app/Http/Controllers/Auth/PasswordResetLinkController.php) | PHP | -27 | -11 | -7 | -45 |
| [app/Http/Controllers/Auth/RegisteredUserController.php](/app/Http/Controllers/Auth/RegisteredUserController.php) | PHP | -34 | -8 | -9 | -51 |
| [app/Http/Controllers/Auth/VerifyEmailController.php](/app/Http/Controllers/Auth/VerifyEmailController.php) | PHP | -19 | -3 | -6 | -28 |
| [app/Http/Controllers/CartController.php](/app/Http/Controllers/CartController.php) | PHP | -68 | 0 | -18 | -86 |
| [app/Http/Controllers/Controller.php](/app/Http/Controllers/Controller.php) | PHP | -5 | -1 | -3 | -9 |
| [app/Http/Controllers/OrderController.php](/app/Http/Controllers/OrderController.php) | PHP | -78 | 0 | -24 | -102 |
| [app/Http/Controllers/ProductController.php](/app/Http/Controllers/ProductController.php) | PHP | -26 | 0 | -7 | -33 |
| [app/Http/Controllers/ProfileController.php](/app/Http/Controllers/ProfileController.php) | PHP | -38 | -9 | -14 | -61 |
| [app/Http/Controllers/UserPanelController.php](/app/Http/Controllers/UserPanelController.php) | PHP | -39 | 0 | -11 | -50 |
| [app/Http/Middleware/RoleAdmin.php](/app/Http/Middleware/RoleAdmin.php) | PHP | -17 | -5 | -5 | -27 |
| [app/Http/Requests/Auth/LoginRequest.php](/app/Http/Requests/Auth/LoginRequest.php) | PHP | -51 | -21 | -14 | -86 |
| [app/Http/Requests/ProfileUpdateRequest.php](/app/Http/Requests/ProfileUpdateRequest.php) | PHP | -22 | -5 | -4 | -31 |
| [app/Models/Address.php](/app/Models/Address.php) | PHP | -25 | 0 | -6 | -31 |
| [app/Models/Cart.php](/app/Models/Cart.php) | PHP | -17 | 0 | -6 | -23 |
| [app/Models/CartItem.php](/app/Models/CartItem.php) | PHP | -19 | 0 | -6 | -25 |
| [app/Models/Category.php](/app/Models/Category.php) | PHP | -15 | 0 | -5 | -20 |
| [app/Models/Order.php](/app/Models/Order.php) | PHP | -30 | 0 | -8 | -38 |
| [app/Models/OrderItem.php](/app/Models/OrderItem.php) | PHP | -23 | 0 | -6 | -29 |
| [app/Models/Product.php](/app/Models/Product.php) | PHP | -53 | 0 | -14 | -67 |
| [app/Models/Product\_image.php](/app/Models/Product_image.php) | PHP | -16 | 0 | -4 | -20 |
| [app/Models/User.php](/app/Models/User.php) | PHP | -30 | -17 | -8 | -55 |
| [app/Providers/AppServiceProvider.php](/app/Providers/AppServiceProvider.php) | PHP | -12 | -8 | -5 | -25 |
| [app/View/Components/AppLayout.php](/app/View/Components/AppLayout.php) | PHP | -11 | -3 | -4 | -18 |
| [app/View/Components/GuestLayout.php](/app/View/Components/GuestLayout.php) | PHP | -11 | -3 | -4 | -18 |
| [public/css/admin-categories-edit.css](/public/css/admin-categories-edit.css) | PostCSS | 9 | 0 | 4 | 13 |
| [public/css/admin-categories.css](/public/css/admin-categories.css) | PostCSS | 20 | 0 | 7 | 27 |
| [public/css/admin-order-details.css](/public/css/admin-order-details.css) | PostCSS | 18 | 0 | 6 | 24 |
| [public/css/admin-orders.css](/public/css/admin-orders.css) | PostCSS | 27 | 0 | 7 | 34 |
| [public/css/admin-panel.css](/public/css/admin-panel.css) | PostCSS | 19 | 0 | 2 | 21 |
| [public/css/admin-product-edit.css](/public/css/admin-product-edit.css) | PostCSS | 9 | 0 | 2 | 11 |
| [public/css/admin-products-add.css](/public/css/admin-products-add.css) | PostCSS | 11 | 0 | 4 | 15 |
| [public/css/admin-products.css](/public/css/admin-products.css) | PostCSS | 35 | 0 | 7 | 42 |
| [public/css/cart.css](/public/css/cart.css) | PostCSS | 34 | 0 | 11 | 45 |
| [public/css/content.css](/public/css/content.css) | PostCSS | 43 | 0 | 10 | 53 |
| [public/css/forgot-password.css](/public/css/forgot-password.css) | PostCSS | 4 | 0 | 2 | 6 |
| [public/css/layout.css](/public/css/layout.css) | PostCSS | 66 | 0 | 18 | 84 |
| [public/css/order-details.css](/public/css/order-details.css) | PostCSS | 21 | 0 | 5 | 26 |
| [public/css/orders.css](/public/css/orders.css) | PostCSS | 9 | 0 | 1 | 10 |
| [public/css/product.css](/public/css/product.css) | PostCSS | 36 | 0 | 10 | 46 |
| [public/css/register.css](/public/css/register.css) | PostCSS | 56 | 0 | 9 | 65 |
| [public/css/user-panel.css](/public/css/user-panel.css) | PostCSS | 10 | 0 | 1 | 11 |
| [public/images/LOGO.svg](/public/images/LOGO.svg) | XML | 75 | 0 | 1 | 76 |
| [public/index.php](/public/index.php) | PHP | 10 | 4 | 7 | 21 |

[Summary](results.md) / [Details](details.md) / [Diff Summary](diff.md) / Diff Details