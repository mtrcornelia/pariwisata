-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2024 at 04:21 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Cagar Alam', '2024-05-14 04:53:47', '2024-05-19 23:21:30'),
(2, 'Cagar Budaya', '2024-05-17 00:11:05', '2024-05-17 01:34:14'),
(4, 'Kuliner', '2024-05-19 23:23:01', '2024-05-19 23:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `name`, `message`, `created_at`, `updated_at`) VALUES
(1, 'intan@gmail.com', 'Intania Yoanda', 'saya ingin mendaftarkan tempat wisata baru yang beranama banda gadang yang terletak di nagari minangkabau kecamatan Sungayang', '2024-05-20 08:51:10', '2024-05-20 08:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_time`, `location`, `file`, `address`, `created_at`, `updated_at`) VALUES
(5, 'Reuni perak', 'Sabtu, 30 September 2023 Di Kyriad Bumi Minang Hotel Jam 8.30 wib s/d 17.30 wib Dress Code Putih & Blue Jeans', '2024-05-31', '-0.9553421251998077, 100.3585494668047', 'img_1716252876_Biru Toska Bergaya Kreatif Tentang Pentas Musik Keragaman Bangsa Poster.png', 'Kyriad Bumi Minang', '2024-05-20 17:54:36', '2024-05-20 17:58:49'),
(8, 'Lomba Puisi Dakwah', 'Lomba Takbiran merupakan perlombaan puisi yang mengandung dakwa di ikuti oleh masyarakat umum se kabupaten Tanah Datar. Perlombaan ini tingkat Kabupaten - Max Umur 30 Tahnun. - Teks terdiri dari dua pilihan 1. Sucikan jiwamu di sepertiga malam 2. Merengkuh Cahaya Ilahi - Durasi Max 15 menit - Perserta max 20 orang - Utusan max 2 orang', '2024-05-20', '-0.38946362298473874, 100.61053730798592', 'img_1716262785_Red Sweet Cake Promo Poster.png', 'Masjid Raya Tanjung, Kecamatan Sungayang, Kabupaten Tanah Datar', '2024-05-20 20:39:45', '2024-05-20 20:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `facility_name`, `created_at`, `updated_at`) VALUES
(1, 'WC', '2024-05-13 21:27:08', '2024-05-20 17:29:58'),
(2, 'Musholah', '2024-05-17 00:25:45', '2024-05-17 00:25:45'),
(4, 'Tempat Parkir', '2024-05-20 19:46:52', '2024-05-20 19:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `facility_tour`
--

CREATE TABLE `facility_tour` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facility_tour`
--

INSERT INTO `facility_tour` (`id`, `tour_id`, `facility_id`, `created_at`, `updated_at`) VALUES
(7, 10, 1, NULL, NULL),
(8, 10, 2, NULL, NULL),
(9, 11, 1, NULL, NULL),
(10, 11, 2, NULL, NULL),
(11, 12, 1, NULL, NULL),
(14, 13, 1, NULL, NULL),
(15, 13, 2, NULL, NULL),
(16, 14, 1, NULL, NULL),
(17, 14, 2, NULL, NULL),
(19, 15, 1, NULL, NULL),
(22, 15, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `tour_id`, `image_path`, `created_at`, `updated_at`) VALUES
(12, 10, 'tours/tour_1715940008_Untitled.jpeg', '2024-05-17 03:00:08', '2024-05-17 03:00:08'),
(13, 10, 'tours/tour_1715940008_batu.jpeg', '2024-05-17 03:00:08', '2024-05-17 03:00:08'),
(14, 11, 'tours/tour_1716003453_sd.jpeg', '2024-05-17 20:37:33', '2024-05-17 20:37:33'),
(15, 11, 'tours/tour_1716003453_s.jpeg', '2024-05-17 20:37:33', '2024-05-17 20:37:33'),
(16, 12, 'tours/tour_1716095378_JS.jpeg', '2024-05-18 22:09:38', '2024-05-18 22:09:38'),
(17, 12, 'tours/tour_1716095378_images.jpeg', '2024-05-18 22:09:38', '2024-05-18 22:09:38'),
(28, 13, 'tours/tour_1716187274_2023-05-13.jpg', '2024-05-19 23:41:14', '2024-05-19 23:41:14'),
(29, 13, 'tours/gallery_1716187828_20211113_190747.jpg', '2024-05-19 23:50:28', '2024-05-19 23:50:28'),
(30, 14, 'tours/tour_1716189191_2023-03-16.jpg', '2024-05-20 00:13:11', '2024-05-20 00:13:11'),
(31, 14, 'tours/tour_1716189191_j.jpg', '2024-05-20 00:13:11', '2024-05-20 00:13:11'),
(32, 14, 'tours/tour_1716189191_2023-03-17.jpg', '2024-05-20 00:13:11', '2024-05-20 00:13:11'),
(33, 15, 'tours/tour_1716260533_Wisata Edukasi di Istano Basa Pagaruyung Menelusuri Sejarah Kerajaan Minangkabau.jpeg', '2024-05-20 20:02:13', '2024-05-20 20:02:13'),
(34, 15, 'tours/tour_1716260533_National Geographic Your Shot - Copy.jpeg', '2024-05-20 20:02:13', '2024-05-20 20:02:13'),
(35, 15, 'tours/tour_1716260534_pgr.jpeg', '2024-05-20 20:02:14', '2024-05-20 20:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_13_110820_create_categories_table', 1),
(6, '2024_05_13_131539_create_tours_table', 1),
(7, '2024_05_14_032851_create_facilitys_table', 1),
(8, '2024_05_14_165946_create_events_table', 2),
(9, '2024_05_15_103747_create_galleries_table', 3),
(10, '2024_05_17_074045_create_facility_tour_table', 4),
(11, '2024_05_18_153011_add_likes_count_to_tours_table', 5),
(12, '2024_05_20_132417_create_contacts_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tour_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `likes_count` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `tour_name`, `category_id`, `address`, `location`, `cover`, `created_by`, `created_date`, `description`, `created_at`, `updated_at`, `likes_count`) VALUES
(10, 'Batu Batikam', 2, 'Lima Kaum1', '-0.4630589230216899, 100.55606556441765', 'img_1716178275_Untitled.jpeg', '9', '2024-05-17', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa aut, minima minus incidunt natus eligendi, ducimus atque tempore excepturi cumque consectetur odio aliquid dignissimos suscipit ipsum facere illum repudiandae fugiat.', '2024-05-17 03:00:08', '2024-05-19 21:11:16', 1),
(11, 'Danau Singkarak', 1, 'Ombilin', NULL, 'img_1716003452_s.jpeg', '9', '2024-05-18', 'Danau Singkarak adalah sebuah danau yang membentang di dua kabupaten yang terdapat di provinsi Sumatera Barat, Indonesia, yaitu kabupaten Solok dan kabupaten Tanah Datar. Danau ini memiliki luas 107,8 km² dan merupakan danau terluas kedua di pulau Sumatra setelah Danau Toba di Sumatera Utara.', '2024-05-17 20:37:32', '2024-05-20 19:08:36', 0),
(12, 'Lembah Anai', 1, 'Singgalang, Kec. Sepuluh Koto, Kabupaten Tanah Datar, Sumatera Barat 27282', '-0.48326481431319246, 100.33805229394486', 'img_1716095377_images.jpeg', '9', '2024-05-19', 'Air Terjun Lembah Anai (dikenal pula Air Mancur, ejaan lama: Ajer Mantjoer) adalah sebuah air terjun yang terletak di jorong aie mancua nagari Singgalang, X Koto, Kabupaten Tanah Datar, Sumatera Barat. Air terjun setinggi sekira 35 meter ini berada tepat di tepi Jalan Raya Padang-Bukittinggi di kaki Gunung Singgalang. Air Terjun Lembah Anai merupakan bagian dari aliran Sungai Batang Lurah, anak Sungai Batang Anai yang berhulu di Gunung Singgalang di ketinggian 400 Mdpl. Air terjun ini terletak di batas barat kawasan Cagar Alam Lembah Anai sehingga suasana masih alami dengan hutan lebat serta pepohonan rimbun. Disekitar air terjun pun terdapat monyet yang berkeliaran. Pada saat liburan, air terjun ini dikunjungi oleh ratusan pengunjung. Keindahannya membuat Air Terjun Lembah Anai menjadi ikon pariwisata', '2024-05-18 22:09:38', '2024-05-20 00:53:08', 1),
(13, 'Mieso Limo Kaum', 4, 'Jalan Balai Labuah Atas, Cubadak, Kec. Lima Kaum, Kabupaten Tanah Datar, Sumatera Barat 27217', NULL, 'img_1716187270_2021-11-27.jpg', '10', '2024-05-20', 'Menyediakan mieso tulang kerbau yang legendaris di batusangkar', '2024-05-19 23:41:11', '2024-05-19 23:47:49', 0),
(14, 'Rumah Makan \"Mak Sari', 4, 'Jl. Raya Batusangkar Jl. Hamka No.KM. 2, Simpuruik, Kec. Sungai Tarab, Kabupaten Tanah Datar, Sumatera Barat 27294', '-0.4424908436802034, 100.58311859473422', 'img_1716189190_unnamed.jpg', '9', '2024-05-20', 'menyediakan berbagai masakan padang', '2024-05-20 00:13:10', '2024-05-20 00:13:10', 0),
(15, 'Istana Pagaruyung', 2, 'Jl. Sutan Alam Bagagarsyah, Pagaruyung, Kec. Tj. Emas, Kabupaten Tanah Datar, Sumatera Barat 27281', '-0.47105500887993806, 100.62130833611505', 'img_1716262377_pgr.jpeg', '9', '2024-05-20', 'Istano Basa Pagaruyung yang lebih terkenal dengan nama Istana Besar Kerajaan Pagaruyung adalah museum berupa replika istana Kerajaan Pagaruyung terletak di Nagari Pagaruyung, Kecamatan Tanjung Emas, Kabupaten Tanah Datar, Sumatera Barat. Istana ini berjarak lebih kurang 5 kilometer dari Batusangkar. Istana ini merupakan objek wisata budaya yang terkenal di Sumatera Barat.\r\n\r\nIstano Basa yang berdiri sekarang sebenarnya adalah replika dari yang asli[butuh rujukan]. Istano Basa yang asli terletak di atas bukit Batu Patah dan dibakar habis pada tahun 1804 saat terjadi Perang Padri. Istana baru didirikan kembali tetapi terbakar lagi pada tahun 1966', '2024-05-20 20:02:13', '2024-05-20 20:32:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `profile_photo`, `created_at`, `updated_at`) VALUES
(9, 'Mutiara Cornelia Damayanti', 'mutiaracornelia1601@gmail.com', '2024-05-19 23:12:11', '$2y$12$T.mac.E8CvaHRjgxXHtbHedH0GT5IoNOZ597cRqyMMFDeQH2ChZ9a', NULL, 'img_1716185377_WhatsApp Image 2024-05-20 at 12.50.35_c0d7d08f.jpg', '2024-05-19 23:09:38', '2024-05-19 23:12:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_tour`
--
ALTER TABLE `facility_tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_tour_tour_id_foreign` (`tour_id`),
  ADD KEY `facility_tour_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tours_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facility_tour`
--
ALTER TABLE `facility_tour`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facility_tour`
--
ALTER TABLE `facility_tour`
  ADD CONSTRAINT `facility_tour_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `facility_tour_tour_id_foreign` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
