-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2022 at 05:19 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmtdltmy_bbr_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `created_by`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'Webicom', 'admin@webicom.com', '$2a$12$LbBTlsI3imIi1jndboorKu5dJRqf6wnnCmTmcCYSEoZcem/ucgoLa', 1, NULL, 'x8IkVXCSpYSfCcEgPr7WzB4HykzYOZyBJDFdbPyHFFzfHaXRLIfEVUusIZT2', '2022-01-31 05:10:05', '2022-01-31 05:10:05'),
(2, 'admin', 'admin@bbr.cafe', '$2a$12$LbBTlsI3imIi1jndboorKu5dJRqf6wnnCmTmcCYSEoZcem/ucgoLa', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `country_iso_code` varchar(4) NOT NULL,
  `is_default` tinyint(4) NOT NULL DEFAULT '0',
  `info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `opening_schedule` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name_en`, `name_ar`, `country_iso_code`, `is_default`, `info`, `opening_schedule`, `status`, `created_by`, `created_at`) VALUES
(1, 'Nasr City', 'مدينة نصر', 'EGY', 1, '{\"facebook\":\"https:\\/\\/facebook.com\\/BrooklynBeanRoasteryCafes\\/\",\"twitter\":null,\"instagram\":\"https:\\/\\/www.instagram.com\\/brooklynbeanroasterycafe\\/\",\"address_en\":\"Brooklyn Bean Cafes, Al Hay Al Asher, Nasr City, Cairo, Egypt\",\"address_ar\":\"\\u0627\\u0644\\u062d\\u064a \\u0627\\u0644\\u0639\\u0627\\u0634\\u0631, \\u0645\\u062f\\u064a\\u0646\\u0629 \\u0646\\u0635\\u0631, \\u0627\\u0644\\u0642\\u0627\\u0647\\u0631\\u0629\",\"mobile\":[\"01050505440\"]}', NULL, 1, 2, '2022-01-30 23:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `country_iso_code` varchar(4) NOT NULL,
  `currency` varchar(8) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name_en`, `name_ar`, `country_iso_code`, `currency`, `status`, `created_by`, `created_at`) VALUES
(1, 'Egypt', 'مصر', 'EGY', 'EGP', 1, 1, '2022-01-30 20:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `custom_choices`
--

CREATE TABLE `custom_choices` (
  `id` int(11) NOT NULL,
  `country_iso_code` varchar(4) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `base_price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_choice_options`
--

CREATE TABLE `custom_choice_options` (
  `id` int(11) NOT NULL,
  `custom_choice_id` int(11) NOT NULL,
  `is_required` tinyint(4) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `max_choices` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `custom_choice_option_types`
--

CREATE TABLE `custom_choice_option_types` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `calories` int(11) DEFAULT NULL,
  `price` float NOT NULL DEFAULT '0',
  `custom_choice_option_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `desserts`
--

CREATE TABLE `desserts` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `country_iso_code` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `desserts`
--

INSERT INTO `desserts` (`id`, `name_en`, `name_ar`, `ingredients`, `calories`, `price`, `status`, `created_by`, `created_at`, `country_iso_code`) VALUES
(1, 'dark chocolate mousse with red fruit coulis', 'الشوكوالتة الداكنة المخفوقة مع صلصة الفواكه الحمراء', '', 0, 44.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(2, 'cheesecake, cherry sauce', 'تشيز كيك وصلصة الكرز', '', 0, 54.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(3, 'chocolate lava cake, nutella, ice cream ', 'كيك الالفا بالشوكوالتة مع النوتيال واأليس كريم', '', 0, 79.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(4, 'rice pudding, vanilla ice cream, nuts, raisins', 'األرز بالحليب والفانيليا واأليس كريم والمكسرات والزبيب', '', 0, 54.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(5, 'seasonal fresh fruit', 'الفواكه الموسمية الطازجة', 'sliced seasonal fruits, selection of ice cream', 0, 59.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(6, 'Sugar and Lemon custard', 'سكر ممزوج بكستارد الليمون', '', 0, 74.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(7, 'Peanut Butter and Banana', 'زبدة الفول السوداني والموز', '', 0, 84.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(8, 'Butter, sugar, and caramelized apple', 'الزبدة والسكر والتفاح المكرمل', '', 0, 74.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(9, 'Fresh Strawberry and Banana', 'الفراولة الطازجة والموز', '', 0, 84.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(10, 'Figs Purée and Banana', 'مربى التين والموز', '', 0, 84.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(11, 'brooklyn crepe', 'كريب بروكلين', 'Chocolate Mousse, Strawberry, Nutella, Whipped Cream, Apple, Caramel and Walnuts', 0, 99.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(12, 'Chocolate Fudge', 'شوكوال فدج', '', 0, 84.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(13, 'Nutella', 'نوتيال', '', 0, 84.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(14, 'Nutella and Banana or Strawberry', 'نوتيال وموز أو فراولة', '', 0, 89.99, 1, 2, '2022-01-31 01:17:58', 'EGY'),
(15, 'the famous crepepicy', 'ذي فاميس كريب', 'strawberry, banana, nutella, ice cream, and whipped cream', 0, 99.99, 1, 2, '2022-01-31 01:17:58', 'EGY');

-- --------------------------------------------------------

--
-- Table structure for table `desserts_addons`
--

CREATE TABLE `desserts_addons` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `calories` int(11) DEFAULT NULL,
  `country_iso_code` varchar(4) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `desserts_addons`
--

INSERT INTO `desserts_addons` (`id`, `name_en`, `name_ar`, `calories`, `country_iso_code`, `price`, `status`, `created_by`, `created_at`) VALUES
(1, 'Ice Cream', 'أيس كريم', NULL, 'EGY', 19.99, 1, 2, '2022-01-31 01:20:17'),
(2, 'Whipped cream', 'كريمة مخفوقة', NULL, 'EGY', 9.99, 1, 2, '2022-01-31 01:20:50'),
(3, 'Strawberries', 'الفراولة', NULL, 'EGY', 14.99, 1, 2, '2022-01-31 01:21:23'),
(4, 'Bananas', 'الموز', NULL, 'EGY', 9.99, 1, 2, '2022-01-31 01:21:56'),
(5, 'Apple', 'التفاح', NULL, 'EGY', 14.99, 1, 2, '2022-01-31 01:22:22'),
(6, 'Oreo', 'أوريو', NULL, 'EGY', 14.99, 1, 2, '2022-01-31 01:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `desserts_tags`
--

CREATE TABLE `desserts_tags` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `desserts_tags`
--

INSERT INTO `desserts_tags` (`id`, `name_en`, `name_ar`, `status`, `created_by`, `created_at`) VALUES
(1, 'Desserts', 'الحلويات', 1, 2, '2022-02-02 19:53:49'),
(2, 'Crepes', 'الكريب', 1, 2, '2022-02-02 19:54:15'),
(3, 'Chocolate', 'الشوكولاتة', 1, 2, '2022-02-02 19:55:08'),
(4, 'Sweet & Fruity', 'الحلو و الفواكه', 1, 2, '2022-02-02 19:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `dessert_addon_pivot`
--

CREATE TABLE `dessert_addon_pivot` (
  `dessert_id` int(11) NOT NULL,
  `desserts_addons_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dessert_addon_pivot`
--

INSERT INTO `dessert_addon_pivot` (`dessert_id`, `desserts_addons_id`) VALUES
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(12, 1),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(14, 5),
(14, 6),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `dessert_tag_pivot`
--

CREATE TABLE `dessert_tag_pivot` (
  `dessert_id` int(11) NOT NULL,
  `desserts_tags_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dessert_tag_pivot`
--

INSERT INTO `dessert_tag_pivot` (`dessert_id`, `desserts_tags_id`) VALUES
(6, 2),
(6, 4),
(7, 4),
(8, 4),
(7, 2),
(8, 2),
(9, 2),
(9, 4),
(10, 2),
(10, 4),
(11, 2),
(11, 4),
(12, 2),
(12, 3),
(13, 2),
(13, 3),
(14, 2),
(14, 3),
(15, 2),
(15, 3),
(15, 4),
(1, 1),
(1, 3),
(2, 1),
(3, 1),
(3, 3),
(4, 1),
(5, 1),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `calories` int(11) DEFAULT NULL,
  `country_iso_code` varchar(4) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `name_en`, `name_ar`, `ingredients`, `calories`, `country_iso_code`, `price`, `status`, `created_by`, `created_at`) VALUES
(1, 'spicy poblano omelette', 'أومليت بصلصة البوبالنو الحارة', 'WE HAVE THE EAT IN HEAT<br>Our omelette stuffed with fire roasted Poblano peppers, red bell peppers & onions, bacon, shredded Jack & Cheddar cheese blend, fresh avocado. ', 0, 'EGY', 74.99, 1, 2, '2022-01-31 00:29:41'),
(2, 'Beef STEAK OMELETTE', 'أومليت شرائح اللحم', 'AS BROOKLYN AS IT GETS <br> Your hunger won’t be at steak with this one. Our omelette stuffed with steak, hash browns, green peppers, onions, mushrooms, tomatoes & Cheddar cheese. Served with our salsa picante.', 0, 'EGY', 99.99, 1, 2, '2022-01-31 00:29:41'),
(3, 'CHICKEN FAJITA OMELETTE', 'أومليت فاهيتا دجاج ', 'THE PERFECT FIESTA PACKAGE <br> Our omelette stuffed with grilled chicken breast with Poblano & red bell peppers, roasted onions and Jack & Cheddar cheese blend. Served with salsa, sour cream.', 0, 'EGY', 84.99, 1, 2, '2022-01-31 00:29:41'),
(4, 'PASTRAMI TEMPTATION OMELETTE', 'أومليت البسطرمة الشهية', 'IT’S WHAT’S ON THE INSIDE THAT COUNTS <br>And in this case, it’s PASTRAMI . Our omelette stuffed with custom cured hickory-smoked PASTRAMI with Jack & Cheddar cheese blend served with our signature sauce. Topped with tomatoes & more PASTRAMI.', 0, 'EGY', 99.99, 1, 2, '2022-01-31 00:29:41'),
(5, 'ORIGINAL BUTTERMILK PANCAKES', 'فطائر بالزبدة البلدي', '(FULL STACK)<br>A true breakfast classic that started it all. Get five of our fluffy, world-famous buttermilk pancakes topped with whipped real butter.', 0, 'EGY', 94.99, 1, 2, '2022-01-31 00:29:41'),
(6, 'FRENCH CReME BRuLeE PANCAKES 99.99', 'فطائر بالزبدة البلدي', '4 pancakes layered with vanilla crème brûlée custard cream & topped with caramelized sugar crystals.', 0, 'EGY', 99.99, 1, 2, '2022-01-31 00:29:41'),
(7, 'STRAWBERRY BANANA PANCAKES', 'فطائر بالزبدة البلدي', 'Little known fact: Strawberries and Bananas are best friends. Four fluffy buttermilk pancakes filled with fresh banana slices. Topped with glazed strawberries & more banana slices.', 0, 'EGY', 99.99, 1, 2, '2022-01-31 00:29:41'),
(8, 'OUR ORIGINAL FRENCH TOAST', 'التوست الفرنسي األصلي ', 'Six triangles of thick-cut French toast topped with whipped real butter & dusted with powdered sugar.', 0, 'EGY', 74.99, 1, 2, '2022-01-31 00:29:41'),
(9, 'bakery basket', 'سلة المخبوزات', 'An assortment of croissants, danishes, muffins, and white or multigrain toast served with butter and preserves.', 0, 'EGY', 84.99, 1, 2, '2022-01-31 00:29:41'),
(10, 'wild mushroom cappuccino', 'كابتشينو مشروم', 'wild mushroom cappuccino', 0, 'EGY', 54.99, 1, 2, '2022-01-31 00:29:41'),
(11, 'chicken orzo', 'كابتشينو مشروم', 'chicken orzo ', 0, 'EGY', 54.99, 1, 2, '2022-01-31 00:29:41'),
(12, 'big nachos', 'بيج ناتشوز ', 'Tortilla chips, cheddar sauce, tomato salsa, guacamole', 0, 'EGY', 69.99, 1, 2, '2022-01-31 00:29:41'),
(13, 'guacamole', 'غواكامولي', 'corn tortilla chips, avocado, lime, coriander', 0, 'EGY', 59.99, 1, 2, '2022-01-31 00:29:41'),
(14, '(GF) shrimp cocktail ', 'كوكتيل جمبر (خالي من الجولتين(', 'cocktail sauce', 0, 'EGY', 149.99, 1, 2, '2022-01-31 00:29:41'),
(15, 'crispy calamari ', 'كاالماري مقرمش', 'crispy calamari ', 0, 'EGY', 119.99, 1, 2, '2022-01-31 00:29:41'),
(16, 'spicy buttermilk cajun fried chicken ', 'دجاج مقلي بصلصة الكاجون الحار والزبدة الطبيعية', 'BBQ sauce', 0, 'EGY', 89.99, 1, 2, '2022-01-31 00:29:41'),
(17, 'BUFFALO CHICKEN', 'دجاج بافلو', 'BUFFALO CHICKEN <br> Crispy chicken, blue cheese, scallions, buffalo sauce on a pesto bread', 0, 'EGY', 109.99, 1, 2, '2022-01-31 00:29:41'),
(18, 'CHICKEN FRESCO WRAP', 'دجاج فريسكو', 'Chicken, arugula, avocado, queso fresco, roasted red peppers, tomatillo salsa on a power wrap', 0, 'EGY', 119.99, 1, 2, '2022-01-31 00:29:41'),
(19, 'SMOKED TURKEY & CHEDDAR', 'رومي مدخن', 'Smoked turkey, cheddar, avocado, tomato, chipotle spread on pizza bianca', 0, 'EGY', 89.99, 1, 2, '2022-01-31 00:29:41'),
(20, 'TURKEY AVOCADO', 'رومي باألفوكادو', 'Smoked turkey, avocado, pepper jack cheese, arugula, tomato, chipotle aioli on 7 grain bread', 0, 'EGY', 99.99, 1, 2, '2022-01-31 00:29:41'),
(21, 'VEGETARIAN', 'نباتي', 'Avocado, tomato, arugula , red onion, roasted almonds, spicy hummus on multigrain bread', 0, 'EGY', 79.99, 1, 2, '2022-01-31 00:29:41'),
(22, 'albacore TUNA sandwich', 'ساندويتش لحم التونا البيضاء', 'Vine Ripe Tomatoes and Lettuce on Seven-Grain Ciabatta ', 0, 'EGY', 89.99, 1, 2, '2022-01-31 00:29:41'),
(23, 'CHICKEN PARMIGIANA', 'جاج بارمجيانا بالباذنجان ', 'Pan-Fried Cutlet with Pomodoro Sauce, Fresh Mozzarella and Parmesan Cheese served on a Sesame Hero', 0, 'EGY', 109.99, 1, 2, '2022-01-31 00:29:41'),
(24, 'SIRLOIN STEAK', 'سيرليون ستيك', 'with Sautéed Peppers, Onions, Mushrooms and Provolone Cheese with Roasted Garlic Aioli served on an Onion-Cheese Foccacia', 0, 'EGY', 139.99, 1, 2, '2022-01-31 00:29:41'),
(25, 'TURKEY CUBAN ', 'رومي كوبي', 'Smoked turkey, cheddar cheese, turkey ham, sliced tomatoes, pickels, and russian dressing. ', 0, 'EGY', 84.99, 1, 2, '2022-01-31 00:29:41'),
(26, 'EGGPLANT MILANESE (Vegetarian) ', 'باذنجان ميالنيزا )نباتي( ', 'Italian Eggplant with Pesto, Tomatoes and Melted Mozzarella served on a Sesame Hero', 0, 'EGY', 99.99, 1, 2, '2022-01-31 00:29:41'),
(27, 'classic caeser', 'سلطة سيزر الكالسيكية', 'Parmesan cheese, cherry tomato, garlic crouton', 0, 'EGY', 74.99, 1, 2, '2022-01-31 00:29:41'),
(28, 'gaucho vegas', 'جوشو فيجاس', 'Avocado, kidney beans, sweet corn, cucumbers, scallions, crispy onion, and roman hearts ', 0, 'EGY', 74.99, 1, 2, '2022-01-31 00:29:41'),
(29, 'california cobb', 'سلطة كوب كاليفورنيا ', 'smoked turkey, turkey bacon or beef bacon, spinach and romaine, mushrooms, tomatoes, cucumbers, blue cheese and egg whites.', 0, 'EGY', 99.99, 1, 2, '2022-01-31 00:29:41'),
(30, '(V,GF) brooklyn house special salad', 'سلطة بروكلين الخاصة', 'mixed greens, sweet corn, avocado, palm heart, dry cherry, citrus dressing', 0, 'EGY', 94.99, 1, 2, '2022-01-31 00:29:41'),
(31, 'PENNE ALLA VODKA', 'بيني بالفودكا', 'grilled chicken, cherry tomatoes, sweet peas, vodka sauce', 0, 'EGY', 139.99, 1, 2, '2022-01-31 00:29:41'),
(32, 'PENNE PRIMAVERa', 'بيني بريمافير', 'sautéed mushrooms, broccoli, peas, onions, peppers, tomato basil sauce', 0, 'EGY', 119.99, 1, 2, '2022-01-31 00:29:41'),
(33, 'WHOLE WHEAT PENNE GENOVESE', 'بيني جينوفيز بحبة القمح الكاملة', 'grilled chicken, sundried tomatoes, olives, spinach, pesto alfredo sauce', 0, 'EGY', 139.99, 1, 2, '2022-01-31 00:29:41'),
(34, 'Brooklyn LINGUINE DEL MARE', 'بروكلي لينجوين ديل ماري', 'sautéed shrimp, grilled salmon, olives, cherry tomatoes, spicy arrabiata sauce', 0, 'EGY', 169.99, 1, 2, '2022-01-31 00:29:41'),
(35, 'Vegetarian Crepe', 'كريب نباتي ', 'Sautéed Spinach with Feta Cheese & kalamata olives', 0, 'EGY', 84.99, 1, 2, '2022-01-31 00:29:41'),
(36, 'brooklyn signature ', 'طبق بروكلين الخاص', 'Sautéed Mushrooms with Shredded Swiss Cheese and Avocado', 0, 'EGY', 99.99, 1, 2, '2022-01-31 00:29:41'),
(37, 'Smoked Turkey, cheddar cheese, and red roasted peppers', 'رومي مدخن وجبن شيد مع فلفل أحمر مشوي', '', 0, 'EGY', 84.99, 1, 2, '2022-01-31 00:29:41'),
(38, 'Pastrami & Mozzarella with Sun-Dried Tomato spread', 'بسطرمة وموزاريال مع صلصة الطماطم المجففة', '', 0, 'EGY', 89.99, 1, 2, '2022-01-31 00:29:41'),
(39, 'Egg and Cheese with caramalized onions and salsa picante', 'بيض وجبنة مع بصل محمر وصلصة بيكانتي', '', 0, 'EGY', 84.99, 1, 2, '2022-01-31 00:29:41'),
(40, 'Smoked Turkey, mushrooms, Swiss Cheese, and dijon mustard', 'رومي مدخن ومشروم وجبن سويسر ومسطردة ديجون', '', 0, 'EGY', 89.99, 1, 2, '2022-01-31 00:29:41'),
(41, 'Sautéed Chicken with Swiss Cheese, Mushrooms and Pesto', 'دجاج سوتيه مع جبن سويسري ومشروم ومكرونة', '', 0, 'EGY', 89.99, 1, 2, '2022-01-31 00:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `dishes_addons`
--

CREATE TABLE `dishes_addons` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `calories` int(11) DEFAULT NULL,
  `country_iso_code` varchar(4) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dishes_addons`
--

INSERT INTO `dishes_addons` (`id`, `name_en`, `name_ar`, `calories`, `country_iso_code`, `price`, `status`, `created_by`, `created_at`) VALUES
(1, 'grilled chicken', 'دجاج مشوي', NULL, 'EGY', 29.99, 1, 2, '2022-01-31 00:33:18'),
(2, 'grilled shrimp', 'جمبري مشوي', NULL, 'EGY', 49.99, 1, 2, '2022-01-31 00:34:01'),
(3, 'Ranch', 'رانش', NULL, 'EGY', 0, 1, 2, '2022-01-31 00:34:53'),
(4, 'Chipotle', 'شيبوتل', NULL, 'EGY', 0, 1, 2, '2022-01-31 00:35:25'),
(5, 'Blue cheese', 'جبنة زرقاء', NULL, 'EGY', 0, 1, 2, '2022-01-31 00:35:51'),
(6, 'Caeser', 'سيزر', NULL, 'EGY', 0, 1, 2, '2022-01-31 00:36:18'),
(7, 'Crispy chicken', 'دجاج مقرمش', NULL, 'EGY', 29.99, 1, 2, '2022-01-31 00:44:57'),
(8, 'Beef meat balls', 'كرات لحم بقري', NULL, 'EGY', 39.99, 1, 2, '2022-01-31 00:44:57'),
(9, 'Beef sausage', 'نقانق لحم بقري', NULL, 'EGY', 29.99, 1, 2, '2022-01-31 00:44:57'),
(10, 'chicken', 'دجاج', NULL, 'EGY', 29.99, 1, 2, '2022-01-31 00:44:57'),
(11, 'pastrami ', 'بسطرمة', NULL, 'EGY', 39.99, 1, 2, '2022-01-31 00:44:57'),
(12, 'Egg, Fresh Tomato, Mushrooms or Basil ', 'بيض وطماطم طازج\r\nأو مشروم أو ريحان', NULL, 'EGY', 14.99, 1, 2, '2022-01-31 00:44:57'),
(13, 'Goat Cheese or Brie ', 'جبن ماعز أو بري', NULL, 'EGY', 19.99, 1, 2, '2022-01-31 00:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `dishes_tags`
--

CREATE TABLE `dishes_tags` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dishes_tags`
--

INSERT INTO `dishes_tags` (`id`, `name_en`, `name_ar`, `status`, `created_by`, `created_at`) VALUES
(1, 'Breakfast', 'الفطور', 1, 2, '2022-01-31 00:59:35'),
(2, 'Soups', 'الشوربة', 1, 2, '2022-02-02 19:25:09'),
(3, 'Starters', 'مقبالت', 1, 2, '2022-02-02 19:26:17'),
(4, 'Sandwiches', 'الساندويتشات', 1, 2, '2022-02-02 19:26:44'),
(5, 'Salads', 'السلطات', 1, 2, '2022-02-02 19:27:06'),
(6, 'Pasta', 'المكرونة', 1, 2, '2022-02-02 19:27:32'),
(7, 'Crepes', 'الكريب', 1, 2, '2022-02-02 19:28:03'),
(8, 'Gluten Free', 'خالي من الجولتين', 1, 2, '2022-02-02 19:34:01'),
(9, 'Vegetarian', 'نباتي', 1, 2, '2022-02-02 19:39:03'),
(10, 'Brooklyn Savory Crepes', 'كريب بروكلين المالح', 1, 2, '2022-02-02 19:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `dish_addon_pivot`
--

CREATE TABLE `dish_addon_pivot` (
  `dish_id` int(11) NOT NULL,
  `dishes_addons_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dish_addon_pivot`
--

INSERT INTO `dish_addon_pivot` (`dish_id`, `dishes_addons_id`) VALUES
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(27, 6),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(28, 5),
(28, 6),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(29, 5),
(29, 6),
(30, 1),
(30, 2),
(30, 3),
(30, 4),
(30, 5),
(30, 6),
(35, 12),
(35, 13),
(36, 10),
(36, 11),
(36, 12),
(36, 13),
(37, 10),
(37, 11),
(37, 12),
(37, 13),
(38, 10),
(38, 11),
(38, 12),
(38, 13),
(39, 10),
(39, 11),
(39, 12),
(39, 13),
(40, 10),
(40, 11),
(40, 12),
(40, 13),
(41, 10),
(41, 11),
(41, 12),
(41, 13);

-- --------------------------------------------------------

--
-- Table structure for table `dish_tag_pivot`
--

CREATE TABLE `dish_tag_pivot` (
  `dish_id` int(11) NOT NULL,
  `dishes_tags_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dish_tag_pivot`
--

INSERT INTO `dish_tag_pivot` (`dish_id`, `dishes_tags_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 2),
(11, 2),
(12, 3),
(13, 3),
(14, 3),
(14, 8),
(15, 3),
(16, 3),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(26, 9),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(30, 9),
(31, 6),
(32, 6),
(33, 6),
(34, 6),
(35, 7),
(35, 9),
(36, 7),
(37, 7),
(37, 10),
(38, 7),
(38, 10),
(39, 7),
(39, 10),
(40, 7),
(40, 10),
(41, 7),
(41, 10);

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `ingredients` varchar(255) DEFAULT NULL,
  `country_iso_code` varchar(4) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `drinks_options`
--

CREATE TABLE `drinks_options` (
  `id` int(11) NOT NULL,
  `drink_id` int(11) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_iso_code` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accepted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_phone`, `customer_address`, `order_type`, `order_body`, `country_iso_code`, `accepted_at`, `status`, `created_at`) VALUES
(1, 'test', '012345678910', '', 'on', '                 <div class=\"container invoice\">                    <div class=\"row\">                        <div class=\"span4\"><div class=\"ilogo\"></div> <address> <strong>Brooklyn Bean Roastery</strong><br>Amazing Coffee From People Who Know Beans <br> 83b832a0-187b-41f5-9e7c-e2322c2f76f1</address></div>                        <div class=\"span4 well\"> <table class=\"invoice-head\"> <tbody>                                    <tr><td class=\"pull-right invoice_Currency\"><strong>Currency: </strong></td><td>EGP</td></tr>                                    <tr><td class=\"pull-right invoice_Name\"><strong>Customer Name: </strong></td><td>test</td></tr>                                    <tr><td class=\"pull-right invoice_Name\"><strong>Customer Phone: </strong></td><td>012345678910</td></tr>                                    <tr><td class=\"pull-right invoice_LocalDate\"><strong>Local Date #</strong></td><td>01/31/2022 at 03:26 AM GMT+2</td></tr>                                    <tr><td class=\"pull-right invoice_OrderType\"><strong>Order Type :</strong></td><td>on</td></tr>                                    <tr><td class=\"pull-right invoice_Address\"><strong>Address: </strong></td><td></td></tr>                        </tbody></table></div>                    </div>                    <div class=\"row\"><div class=\"span8\"> <h2>Receipt</h2></div></div>                    <div class=\"row\">                        <div class=\"span8 well invoice-body\"><table class=\"table table-bordered\">                                <thead><tr><th>Item</th><th>QTY</th> <th>Price</th><th>Total</th></tr></thead>                                <tbody>                                    <tr><td>#ORD-DI_1<br><b style=\"color:#e75b1e;\">spicy poblano omelette &nbsp </b> <i>74.99 EGP</i><br><br><b>Notes: </b></td><td>1</td><td>75.0</td><td>75</td></tr><tr><td>#ORD-DI_27<br><b style=\"color:#e75b1e;\">classic caeser &nbsp </b> <i>74.99 EGP</i><br><br><b>Notes: </b><b><i class=\"fa fa-plus\"></i>Add-ons</b><br><b style=\"color:#e75b1e;\">grilled chicken</b> <i>29.99 EGP</i><br><b style=\"color:#e75b1e;\">grilled shrimp</b> <i>49.99 EGP</i><br></td><td>1</td><td>155.0</td><td>155</td></tr>                                    <tr> <td colspan=\"4\"></td></tr>                                    <tr><td colspan=\"2\">&nbsp;</td><td><strong>SubTotal</strong></td><td><strong>230</strong></td></tr>                                    <tr><td colspan=\"2\">&nbsp;</td><td><strong>Tax</strong></td><td><strong>0</strong></td></tr>                                    <tr><td colspan=\"2\">&nbsp;</td><td><strong>Shipping</strong></td><td><strong>0</strong></td></tr>                                    <tr><td colspan=\"2\">&nbsp;</td><td><strong>Total</strong></td><td><strong>230</strong></td></tr>                                </tbody>                        </table></div>                    </div>                    <div class=\"row\"><div class=\"span8 well invoice-thank\"><h5 style=\"text-align:center;\">Thank You!</h5></div></div>                </div>', 'EGY', NULL, 1, '2022-01-31 01:26:44'),
(2, 'test', '01234567891', '', 'on', '                 <div class=\"container invoice\">                    <div class=\"row\">                        <div class=\"span4\"><div class=\"ilogo\"></div> <address> <strong>Brooklyn Bean Roastery</strong><br>Amazing Coffee From People Who Know Beans <br> 606a32a0-735d-4b32-becf-3a26893b6a22</address></div>                        <div class=\"span4 well\"> <table class=\"invoice-head\"> <tbody>                                    <tr><td class=\"pull-right invoice_Currency\"><strong>Currency: </strong></td><td>EGP</td></tr>                                    <tr><td class=\"pull-right invoice_Name\"><strong>Customer Name: </strong></td><td>test</td></tr>                                    <tr><td class=\"pull-right invoice_Name\"><strong>Customer Phone: </strong></td><td>01234567891</td></tr>                                    <tr><td class=\"pull-right invoice_LocalDate\"><strong>Local Date #</strong></td><td>02/02/2022 at 10:45 PM GMT+2</td></tr>                                    <tr><td class=\"pull-right invoice_OrderType\"><strong>Order Type :</strong></td><td>on</td></tr>                                    <tr><td class=\"pull-right invoice_Address\"><strong>Address: </strong></td><td></td></tr>                        </tbody></table></div>                    </div>                    <div class=\"row\"><div class=\"span8\"> <h2>Receipt</h2></div></div>                    <div class=\"row\">                        <div class=\"span8 well invoice-body\"><table class=\"table table-bordered\">                                <thead><tr><th>Item</th><th>QTY</th> <th>Price</th><th>Total</th></tr></thead>                                <tbody>                                    <tr><td>#ORD-DI_3<br><b style=\"color:#e75b1e;\">CHICKEN FAJITA OMELETTE &nbsp </b> <i>84.99 EGP</i><br><br><b>Notes: </b></td><td>1</td><td>85.0</td><td>85</td></tr><tr><td>#ORD-DE_6<br><b style=\"color:#e75b1e;\">Sugar and Lemon custard &nbsp </b> <i>74.99 EGP</i><br><br><b>Notes: </b><b><i class=\"fa fa-plus\"></i>Add-ons</b><br><b style=\"color:#e75b1e;\">Ice Cream</b> <i>19.99 EGP</i><br><b style=\"color:#e75b1e;\">Whipped cream</b> <i>9.99 EGP</i><br><b style=\"color:#e75b1e;\">Strawberries</b> <i>14.99 EGP</i><br><b style=\"color:#e75b1e;\">Bananas</b> <i>9.99 EGP</i><br><b style=\"color:#e75b1e;\">Apple</b> <i>14.99 EGP</i><br><b style=\"color:#e75b1e;\">Oreo</b> <i>14.99 EGP</i><br></td><td>1</td><td>159.9</td><td>159.9</td></tr>                                    <tr> <td colspan=\"4\"></td></tr>                                    <tr><td colspan=\"2\">&nbsp;</td><td><strong>SubTotal</strong></td><td><strong>244.9</strong></td></tr>                                    <tr><td colspan=\"2\">&nbsp;</td><td><strong>Tax</strong></td><td><strong>0</strong></td></tr>                                    <tr><td colspan=\"2\">&nbsp;</td><td><strong>Shipping</strong></td><td><strong>0</strong></td></tr>                                    <tr><td colspan=\"2\">&nbsp;</td><td><strong>Total</strong></td><td><strong>244.9</strong></td></tr>                                </tbody>                        </table></div>                    </div>                    <div class=\"row\"><div class=\"span8 well invoice-thank\"><h5 style=\"text-align:center;\">Thank You!</h5></div></div>                </div>', 'EGY', NULL, 0, '2022-02-02 20:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description_en` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `country_iso_code` varchar(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `number_of_guests` tinyint(4) NOT NULL DEFAULT '2',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `occasion` varchar(255) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `UID` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `accepted_by` int(11) DEFAULT NULL,
  `accepted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `max_chairs` tinyint(4) NOT NULL DEFAULT '2',
  `loc_x` int(11) DEFAULT NULL,
  `loc_y` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `admins_created_by` (`created_by`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_ar` (`name_ar`),
  ADD UNIQUE KEY `name_en` (`name_en`) USING BTREE,
  ADD KEY `branch_created_by` (`created_by`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_created_by` (`created_by`);

--
-- Indexes for table `custom_choices`
--
ALTER TABLE `custom_choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_choices_created_by` (`created_by`);

--
-- Indexes for table `custom_choice_options`
--
ALTER TABLE `custom_choice_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_choice_options_created_by` (`created_by`),
  ADD KEY `custom_choice_options_custom_choice_id` (`custom_choice_id`);

--
-- Indexes for table `custom_choice_option_types`
--
ALTER TABLE `custom_choice_option_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custom_choice_option_type_custom_choice_option_id` (`custom_choice_option_id`),
  ADD KEY `custom_choice_option_type_created_by` (`created_by`);

--
-- Indexes for table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dessert_created_by` (`created_by`);

--
-- Indexes for table `desserts_addons`
--
ALTER TABLE `desserts_addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desserts_addons_created_by` (`created_by`);

--
-- Indexes for table `desserts_tags`
--
ALTER TABLE `desserts_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `desserts_tags_created_by` (`created_by`);

--
-- Indexes for table `dessert_addon_pivot`
--
ALTER TABLE `dessert_addon_pivot`
  ADD KEY `dessert_addon_pivot_dessert_id` (`dessert_id`),
  ADD KEY `dessert_addon_pivot_desserts_addons_id` (`desserts_addons_id`);

--
-- Indexes for table `dessert_tag_pivot`
--
ALTER TABLE `dessert_tag_pivot`
  ADD KEY `dessert_tag_pivot_dessert_id` (`dessert_id`),
  ADD KEY `dessert_tag_pivot_desserts_tags_id` (`desserts_tags_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_created_by` (`created_by`);

--
-- Indexes for table `dishes_addons`
--
ALTER TABLE `dishes_addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_addons_created_by` (`created_by`);

--
-- Indexes for table `dishes_tags`
--
ALTER TABLE `dishes_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_tags_created_by` (`created_by`);

--
-- Indexes for table `dish_addon_pivot`
--
ALTER TABLE `dish_addon_pivot`
  ADD KEY `dish_addon_pivot_dish_id` (`dish_id`),
  ADD KEY `dish_addon_pivot_dishes_addons_id` (`dishes_addons_id`);

--
-- Indexes for table `dish_tag_pivot`
--
ALTER TABLE `dish_tag_pivot`
  ADD KEY `dish_tag_pivot_dish_id` (`dish_id`),
  ADD KEY `dish_tag_pivot_dishes_tags_id` (`dishes_tags_id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drinks_created_by` (`created_by`);

--
-- Indexes for table `drinks_options`
--
ALTER TABLE `drinks_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drink_options_created_by` (`created_by`),
  ADD KEY `drink_options_drink_id` (`drink_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_created_by` (`created_by`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_accepted_by` (`accepted_by`),
  ADD KEY `reservation_branch_id` (`branch_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_branch_id` (`branch_id`),
  ADD KEY `table_created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_choices`
--
ALTER TABLE `custom_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_choice_options`
--
ALTER TABLE `custom_choice_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_choice_option_types`
--
ALTER TABLE `custom_choice_option_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `desserts_addons`
--
ALTER TABLE `desserts_addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `desserts_tags`
--
ALTER TABLE `desserts_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `dishes_addons`
--
ALTER TABLE `dishes_addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dishes_tags`
--
ALTER TABLE `dishes_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drinks_options`
--
ALTER TABLE `drinks_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branch_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `custom_choices`
--
ALTER TABLE `custom_choices`
  ADD CONSTRAINT `custom_choices_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `custom_choice_options`
--
ALTER TABLE `custom_choice_options`
  ADD CONSTRAINT `custom_choice_options_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `custom_choice_options_custom_choice_id` FOREIGN KEY (`custom_choice_id`) REFERENCES `custom_choices` (`id`);

--
-- Constraints for table `custom_choice_option_types`
--
ALTER TABLE `custom_choice_option_types`
  ADD CONSTRAINT `custom_choice_option_type_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `custom_choice_option_type_custom_choice_option_id` FOREIGN KEY (`custom_choice_option_id`) REFERENCES `custom_choice_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `desserts`
--
ALTER TABLE `desserts`
  ADD CONSTRAINT `dessert_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `desserts_addons`
--
ALTER TABLE `desserts_addons`
  ADD CONSTRAINT `desserts_addons_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `desserts_tags`
--
ALTER TABLE `desserts_tags`
  ADD CONSTRAINT `desserts_tags_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `dessert_addon_pivot`
--
ALTER TABLE `dessert_addon_pivot`
  ADD CONSTRAINT `dessert_addon_pivot_dessert_id` FOREIGN KEY (`dessert_id`) REFERENCES `desserts` (`id`),
  ADD CONSTRAINT `dessert_addon_pivot_desserts_addons_id` FOREIGN KEY (`desserts_addons_id`) REFERENCES `desserts_addons` (`id`);

--
-- Constraints for table `dessert_tag_pivot`
--
ALTER TABLE `dessert_tag_pivot`
  ADD CONSTRAINT `dessert_tag_pivot_dessert_id` FOREIGN KEY (`dessert_id`) REFERENCES `desserts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dessert_tag_pivot_desserts_tags_id` FOREIGN KEY (`desserts_tags_id`) REFERENCES `desserts_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dishes_addons`
--
ALTER TABLE `dishes_addons`
  ADD CONSTRAINT `dishes_addons_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dishes_tags`
--
ALTER TABLE `dishes_tags`
  ADD CONSTRAINT `dishes_tags_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dish_addon_pivot`
--
ALTER TABLE `dish_addon_pivot`
  ADD CONSTRAINT `dish_addon_pivot_dish_id` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`),
  ADD CONSTRAINT `dish_addon_pivot_dishes_addons_id` FOREIGN KEY (`dishes_addons_id`) REFERENCES `dishes_addons` (`id`);

--
-- Constraints for table `dish_tag_pivot`
--
ALTER TABLE `dish_tag_pivot`
  ADD CONSTRAINT `dish_tag_pivot_dish_id` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dish_tag_pivot_dishes_tags_id` FOREIGN KEY (`dishes_tags_id`) REFERENCES `dishes_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drinks`
--
ALTER TABLE `drinks`
  ADD CONSTRAINT `drinks_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drinks_options`
--
ALTER TABLE `drinks_options`
  ADD CONSTRAINT `drink_options_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drink_options_drink_id` FOREIGN KEY (`drink_id`) REFERENCES `drinks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservation_accepted_by` FOREIGN KEY (`accepted_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `table_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_created_by` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
