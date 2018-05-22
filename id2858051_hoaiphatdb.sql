-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 05:10 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id2858051_hoaiphatdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Breakfast'),
(4, 'Dessert'),
(3, 'Dinner'),
(2, 'Lunch');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `recipe` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `making` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `recipe`, `created`, `making`) VALUES
(2, 'French Toast Recipes', 'img/20180105223310ChocolateStuffedFrenchToast.jpg', '12 slices challah (egg bread), 1/2 inch thick\r\n1/2 cup Philadelphia Chocolate Cream Cheese Product\r\n6 eggs\r\n1 cup milk\r\n1/2 tsp. almond extract\r\n1/2 cup maple syrup\r\n1/4 cup sliced almonds, toasted', '2018-01-06 04:33:10', 'Spread 6 bread slices with cream cheese product; cover with remaining bread slices. Lightly press edges together to seal. Whisk eggs, milk and extract in 13x9-inch dish until blended. Dip both sides of sandwiches in egg mixture, then arrange in same dish, stacking as necessary to fit. Refrigerate 30 min.<br>\r\nHeat oven to 400Â°F. Place sandwiches in single layer on baking sheet sprayed with cooking spray, letting excess egg mixture drip back into dish before placing sandwiches on baking sheet. Discard leftover egg mixture.<br>\r\nBake 18 to 20 min. or until sandwiches are puffed and golden brown, turning after 10 min. Serve topped with syrup and nuts.'),
(3, 'Bruschetta Cheese Stuffed-Chicken Breasts', 'img/20180105230029BruschettaChickenBreasts.jpg', '1 can (19 fl oz/540 mL) diced tomatoes with garlic and olive oil, undrained<br>\r\n1-1/4 cups Cracker Barrel Shredded Mozzarella Cheese, divided<br>\r\n1/4 cup chopped fresh basil<br>\r\n1 pkg. (120 g) Stove Top Stuffing Mix for Chicken<br>\r\n8 small boneless skinless chicken breasts (2 lb./900 g), pounded to 1/4-inch thickness<br>\r\n1/3 cup Kraft Roasted Red Pepper with Parmesan Dressing', '2018-01-06 05:00:29', 'Heat oven to 350ÂºF.<br>\r\nMix tomatoes, 1/2 cup cheese and basil in medium bowl. Add stuffing mix; stir just until moistened.<br>\r\nPlace chicken breasts, top sides down, on cutting board. Spread chicken with stuffing mixture. Starting at 1 narrow end, tightly roll up each breast. Place, seam sides down, in 13x9-inch baking dish; drizzle with dressing.<br>\r\nBake 40 min. or until chicken is done (170Â°F). Sprinkle with remaining cheese; bake 5 min. or until melted.<br>');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cost` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `description`, `image`, `cost`, `category_id`) VALUES
(34, 'Indian Food', 'in01', '', 'img/20171209042844g3.jpg', '47000', 3),
(37, 'Asian Meals', 'am01', 'Dished of Asian People. Enjoy it', 'img/20171212081033g8.jpg', '150000', 2),
(38, 'Sandwich', 'sw01', '2 egg - a sausage', 'img/20171212082015g1.jpg', '40000', 1),
(39, 'Sandwich & Soup', 'ss01', 'Bring to you full of energy', 'img/20171212082208g7.jpg', '120000', 1),
(40, 'Bread Toast', 'bt01', 'Works Energy', 'img/20171212082701img1.jpg', '50000', 2),
(41, 'Sushi Collected', 'sc01', 'Your tongue can feel the sour, spicy, salty, sweet', 'img/20171213133505g2.jpg', '70000', 3),
(42, 'Duck Roast', 'dr01', 'Have a good meal', 'img/20171213134931g9.jpg', '160000', 3),
(43, 'Sandwich & Soup', 'ss02', 'Have a good meal', 'img/20171214105237g5.jpg', '120000', 2),
(44, 'Rice & Meat', 'rm01', 'Have a nice meal', 'img/20171214105338g4.jpg', '150000', 3),
(45, 'Savory Oatmeal', 'om01', 'Prepare as usual with milk or water, but add a pinch of salt and pepper instead of any cinnamon or sugar. Then top with an over-easy or poached egg and sprinkle on a little cheese for an extra tasty kick.', 'img/20171214105750Savory Egg Oatmeal.jpg', '80000', 1),
(46, 'Quinoa Fruit Salad', 'sl02', 'Spice up a plain old fruit cup with a scoop of quinoa. Toss the whole shebang around until the quinoa is evenly distributed. Add a dressing of honey, lime, and basil for a little extra body.', 'img/20171214110529Quinoa-Berry-Fruit-Salad.jpg', '70000', 1),
(47, 'Avocado Toast', 'at01', 'Top two lightly toasted slices of whole-grain bread with smashed avocado and a sprinkling of salt and pepper. Layer on two sunny-side up eggs for a healthy dose of protein, and got a well breakfast.', 'img/20171214110942Avocado-egg-Toast.jpg', '60000', 1),
(50, 'Casserole', 'cr01', 'Wake up smelling put breakfast on your plate, all thanks to the beauty of a slow cooker. Layer the vegetables, sausage, and cheese in the Crock-Pot, then top with a mix of eggs and cream', 'img/20171214111644Egg Cass.jpg', '50000', 1),
(51, 'Sweet Burrito', 'sb01', 'Make a bunch, wrap in foil, and keep in the freezer for whenever the craving hits. Protein from the eggs and black beans keeps you fuller longer, and the sweet potato keeps things interesting.', 'img/20171214111901Balck-Bean-Burrito.jpg', '85000', 1),
(53, 'Pumpkin Oatmeal', 'om02', 'This recipe pairs the pumpkin with oats, chia seeds, cocoa, and almond milk for a quick and easy breakfast.', 'img/20171214112312Choco pumpkin oats.jpg', '120000', 1),
(54, 'Yogurt Smoothie', 'st01', 'Blend frozen fruit (banana and berries work well) with Greek yogurt and a liquid of your choice (milk, juice, coconut waterâ€”whatever you like).', 'img/20171214112535Berry-Banana-Smoothie.jpg', '50000', 1),
(56, 'White Bean and Mozzarella Sandwich', 'sw02', 'The white beans add good-for-you fiber and make this lunch more filling than your average veggie sandwich.', 'img/20171214200038100678415.jpg', '60000', 2),
(57, 'Bread Cheese Cup', 'bc01', 'We have rounded up the most satisfying egg and cheese dishes â€” quiches, muffins, scrambles, and sandwiches â€” to start your day off right. The best part is, most of these recipes are easy to make, which means more time for coffee and your morning social scroll.', 'img/20180105023830Egg-Cheese-Recipes.jpg', '30000', 1),
(58, 'Bistec a Caballo', 'cd01', 'Bistec a Caballo is made with skirt steak or flank steak and is delicious, try it!', 'img/20180105024452Bistec-a-caballo-de-Colombia.jpg', '70000', 2),
(59, 'Hungarian Pork Stew', 'hd01', 'A flavorful stew, PÃ¶rkÃ¶lt is redolent with the fragrance of paprika and bell peppers. Save time by using boneless pork chops and cubing them after they are browned. There should be enough salt in the canned tomatoes to season the stew, but if not, add more to your taste. We prefer to serve it with noodles, but galuska (Hungarian dumplings) or rice are good, too.', 'img/2018010502522054726.jpg', '84000', 3),
(63, 'Cheesy Chicken Enchilada', 'en01', 'Homemade enchiladas dont have to take hours to make! In just 40 minutes, this taste-tempting version is on the table and ready to serve.', 'img/20180105164229Cheesy Chicken Enchilada.jpg', '100000', 3),
(64, 'BBQ Pork Tenderloin', 'bbq01', 'Enjoy the thrill of the grill this season with BBQ Pork Tenderloin recipes that help you to maintain a sizzling supply of tasty meals. Fast, easy and delicious dinners, wonderful weekend entertaining and yummy lunches; no matter what occasion, every home cook needs these BBQ pork tenderloin recipes in their collection.', 'img/20180105164807BBQ Pork Tenderloin.jpg', '150000', 3),
(66, 'Cheese Pasta Roll-ups', 'pt01', ' Noodle over a hearty range of tastes and ingredients and then take your pick. With baked pasta dishes, new chicken and pasta combinations and easy pasta recipes, youâ€™ll satisfy your carb cravings with the best pasta recipes.', 'img/20180105165911Best Pasta.jpg', '84000', 3),
(69, 'Turkey-Cheddar Panini', 'sw03', 'No longer just lunchtime fare, these super sandwiches are hearty enough to serve for supper. Far more satisfying than cold cuts between two slices of bread, you might even say they are the HERO of their class.', 'img/20180105185043Turkey-Cheddar Panini.jpg', '60000', 2),
(70, 'Philly-Style Grilled Cheese', 'sw04', 'This is not any ordinary grilled cheese sandwich - our Philly-Style Grilled Cheese has big flavour for the big kid in you. Made with marble rye bread, KRAFT SINGLES, deli roast beef and green peppers, this grilled cheese sandwich is sure to become a lunch favourite.', 'img/20180105210525Philly-Style_Grilled_Cheese.jpg', '55000', 2),
(71, 'Steak & Vegetable Gyro', 'sb02', 'If you have never had a gyro, now is your chance. A gyro is a Greek pita sandwich, traditionally stuffed with roasted meat, vegetables and tzatziki. Our HEALTHY LIVING version has all of the flavour of the classic sandwich, made easily at home!', 'img/20180105210927Steak & Vegetable Gyro.jpg', '43000', 2),
(72, '\"Steakhouse\" Grinder', 'st02', 'Our Steakhouse Grinder sandwich is the real deal - saucy onions and mushrooms, sliced roast beef and Cheddar cheese on a fresh submarine roll. Treat yourself to something other than your ordinary sandwich.', 'img/20180105211148Steakhouse-Grinder-KC.jpg', '63000', 2),
(73, 'OREO Cookie Split', 'oc01', 'Yes, we have done it again.  Here is a winning dessert recipe that is perfect for kids of all ages!  Made with chocolate pudding, sliced bananas, whipped topping and OREO Cookies, this OREO Split recipe gets two thumbs up.', 'img/20180105211527OREO Cookie Split.jpg', '32000', 4),
(74, 'Very Berry Cheesecake', 'cake01', 'Looking for a pretty and tasty dessert recipe? Look no further! This berry cheesecake recipe is sure to impress. With velvety cream cheese, fresh berries and a classic graham crumb crust, this is a winning cheesecake recipe!', 'img/20180105211851Very Berry Cheesecake.jpg', '44000', 4),
(75, 'Chocolate Truffle Cheesecake', 'cake02', 'Okay chocolate lovers - this cheesecake recipe is for you. Made with a chocolate cookie crumb crust, semi-sweet chocolate and hazelnut flavoured liqueur, our Chocolate Truffle Cheesecake is a guaranteed winner.', 'img/20180105212014Chocolate Truffle Cheesecake.jpg', '100000', 4),
(76, 'Peanut Butter-Chocolate Trifle', 'Trifle01', 'Thereâ€™s nothing trifling about this dessert that has it all: creamy chocolate pudding, whipped topping, chocolate chip cookies and peanut butter-flavoured pudding. Our no-bake Peanut Butter-Chocolate Trifle dessert is a must-try!', 'img/20180105212624PeanutButterChocolateTrifle.jpg', '57000', 4),
(77, 'Mini Fruit Tarts', 'Tart01', 'Fresh fruit tarts are always a dessert sensation, so we decided to create one more variation for you to try. Made with frozen mini tart shells, these bite-size Mini Fruit Tarts may be small in size but they are big in flavour!', 'img/20180105212810Mini Fruit Tarts.jpg', '5000', 4),
(78, 'Peanut Butter & Chocolate Glazed Pie', 'Pie01', 'It is nice to have a no-bake dessert recipe up your sleeve. In this luscious no-bake pie, a chocolate cookie crust gets layered with a peanut butter-cream cheese filling and a chocolate topping.', 'img/20180105213328Peanut&ChocolateGlazedPie.jpg', '66000', 4),
(79, 'Cran-Apple Pie', 'Pie02', 'We turned up the flavour in this fall favourite - apple pie gets a tart twist from dried cranberries! Our Cran-Apple Pie tastes even better with a dollop of whipped topping or a scoop of vanilla ice cream - yum!', 'img/20180105213512Cran-Apple Pie.jpg', '10000', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `created`) VALUES
(2, 'admin', 'admin', 'admin', '0000-00-00 00:00:00'),
(7, 'test', 'test', '', '0000-00-00 00:00:00'),
(8, '123123', '123123', '', '0000-00-00 00:00:00'),
(13, 'atcvs', 'zxc', '', '2018-01-06 03:52:44'),
(14, 'abcd', '123', '', '2018-01-06 03:54:33'),
(15, 'lkj', '123', '', '2018-01-06 04:06:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
