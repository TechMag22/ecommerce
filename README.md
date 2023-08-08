<p>This is an E-Commerce website using Laravel version 9, this application has the following features:</p>
<ul>
  <li>Authentication Scaffolding</li>
  <li>Create Product</li>
  <li>Show All Product</li>
  <li>Show Detail Product</li>
  <li>Update Product</li>
  <li>Delete Product</li>
  <li>Add to Cart</li>
  <li>Show Cart</li>
  <li>Update Cart</li>
  <li>Delete Cart</li>
  <li>Checkout</li>
  <li>Show Order</li>
  <li>Show Specific Order</li>
  <li>Submit Payment Receipt</li>
  <li>Confirm Payment</li>
  <li>Show Profile</li>
  <li>Change Profile Details</li>
  <li>Styling UI</li>
  <li>Show Total Price in Cart and Order</li>
  <li>Admin Seeding</li>
  <li>Middleware Admin</li>
  <li>Middleware Group</li>
  <li>Roles for Order Feature</li>
</ul>

<br>
<p>Configuration Steps:</p>
<p>git clone https://github.com/TechMag22/ecommerce.git</p>
<p>Copy environment example file and rename it into .env file</p>
<p>Open terminal and do the necessary pre-build components as follows:</p>
<p>composer install</p>
<p>php artisan key:generate</p>
<p>npm install vite</p>
<p>npm run build</p>
<p>php artisan migrate --seed</p>
<p>php artisan serve</p>
<p>Login as admin by using the credentials DatabaseSeeder file user modal data</p>
<p>Create product under admin dropdown menu</p>
<p>Once created all the products run the command "php artisan storage:link" to link uploaded product images</p>
<p>The application setup is over</p>
<p>You can register and login as different users by register and login menus</p>
<p>For forget password email configuration follow the below steps:</p>
<p>Need to login with the user email in https://mailtrap.io/</p>
<p>Once logged in, navigate to Email Testing->Inboxes->My Inbox</p>
<p>Select the Laravel 9+ from the Integrations dropdown and copy the email configuation into your .env file</p>
<p>Once mail configuration done you can reset your password.</p>
<p>Reset password link send to the mailtrap account inbox, you can reset the password by accessing the link</p>
<p>Thank you...</p>