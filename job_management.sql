-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 12:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `applies`
--

CREATE TABLE `applies` (
  `id` bigint(20) NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `teaching_assistants_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applies`
--

INSERT INTO `applies` (`id`, `supervisor_id`, `teaching_assistants_id`, `student_id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 'test', 'test', '1', '2024-06-22 05:35:55', '2024-06-23 02:19:03'),
(2, 1, 2, 2, 'new', 'new', '2', '2024-06-22 05:41:40', '2024-06-23 02:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `apply_members`
--

CREATE TABLE `apply_members` (
  `id` bigint(20) NOT NULL,
  `apply_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_members`
--

INSERT INTO `apply_members` (`id`, `apply_id`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-06-22 05:35:55', '2024-06-22 05:35:55'),
(2, 2, 1, '2024-06-22 05:41:40', '2024-06-22 05:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `name`, `location`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'center', 'test', 'test', '2024-06-22 04:37:53', '2024-06-22 04:37:53'),
(2, 'assuit', 'assuit', 'email@gmail.com', '2024-06-23 01:43:10', '2024-06-23 01:43:10'),
(3, 'qena', 'qena', 'email@gmail.com', '2024-06-23 01:58:58', '2024-06-23 01:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `team_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2024-06-23 02:21:39', '2024-06-23 02:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2024_05_06_081437_create_permission_tables', 1),
(6, '2024_05_07_200742_create_centers_table', 1),
(7, '2024_05_07_210658_create_teams_table', 1),
(8, '2024_05_07_213507_create_projects_table', 1),
(9, '2024_05_07_231141_create_proposals_table', 1),
(10, '2024_05_09_161338_create_skils_table', 1),
(11, '2024_05_09_165814_create_students_table', 1),
(12, '2024_05_09_200413_create_supervisors_table', 1),
(13, '2024_05_09_210529_create_teaching__assistants_table', 1),
(14, '2024_05_12_194818_create_team__members_table', 1),
(15, '2024_05_16_093744_create_applies_table', 1),
(16, '2024_05_16_094641_add_status_to_applies', 1),
(17, '2024_05_18_172048_create_student__teams_table', 1),
(18, '2024_05_18_195801_create_student__team_members_table', 1),
(19, '2024_05_18_210431_create_apply_members_table', 1),
(20, '2024_05_20_030338_add_teaching_assistants_id_to_applies', 1),
(21, '2024_05_20_034905_create_student_projects_table', 1),
(22, '2024_05_23_222357_create_members_table', 1),
(23, '2024_06_09_134555_add_stuednt_count_to_teams', 1),
(24, '2024_06_09_160507_create_student_documents_table', 1),
(25, '2024_06_09_214527_create_notifications_table', 1),
(26, '2024_06_11_065408_create_project_requests_table', 1),
(27, '2024_06_11_213643_add_status_to_projects', 1),
(28, '2024_06_11_225958_create_studet_tame_tasks_table', 1),
(29, '2024_06_12_154021_create_student_skils_table', 1),
(30, '2024_06_18_183033_add_student_id_to_team_members', 1),
(31, '2024_06_18_184536_add_team_id_to_projects', 1),
(32, '2024_06_18_190340_add_status_to_teams', 1),
(33, '2024_06_22_074507_create_team_requests_table', 2),
(34, '2024_06_22_234411_create_project_tags_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Roles', 'web', '2024-06-22 04:34:59', '2024-06-22 04:34:59'),
(2, 'role_create', 'web', '2024-06-22 04:35:00', '2024-06-22 04:35:00'),
(3, 'role_show', 'web', '2024-06-22 04:35:00', '2024-06-22 04:35:00'),
(4, 'role_edit', 'web', '2024-06-22 04:35:00', '2024-06-22 04:35:00'),
(5, 'role_delete', 'web', '2024-06-22 04:35:00', '2024-06-22 04:35:00'),
(6, 'Users', 'web', '2024-06-22 04:35:00', '2024-06-22 04:35:00'),
(7, 'user_create', 'web', '2024-06-22 04:35:00', '2024-06-22 04:35:00'),
(8, 'user_edit', 'web', '2024-06-22 04:35:00', '2024-06-22 04:35:00'),
(9, 'user_delete', 'web', '2024-06-22 04:35:00', '2024-06-22 04:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `center_id`, `supervisor_id`, `team_id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'pro1', 'pro1', '0', '2024-06-22 06:08:04', '2024-06-22 06:10:51'),
(2, 1, 1, 1, 'test', 'test', '0', '2024-06-22 21:14:20', '2024-06-22 21:14:20'),
(3, 1, 1, 1, 'test', 'test', '0', '2024-06-22 21:15:27', '2024-06-22 21:15:27'),
(4, 1, 1, 1, 'test', 'tset', '0', '2024-06-22 21:18:14', '2024-06-22 21:18:14'),
(5, 1, 1, 1, 'new', 'new', '0', '2024-06-22 21:18:46', '2024-06-22 21:18:46'),
(6, 1, 1, 1, 'new', 'new', '0', '2024-06-22 21:20:39', '2024-06-22 21:20:39'),
(7, 1, 1, 1, 'new', 'new', '0', '2024-06-22 21:21:53', '2024-06-22 21:21:53'),
(8, 1, 1, 1, 'new', 'new', '0', '2024-06-22 21:22:41', '2024-06-22 21:22:41'),
(9, 1, 1, 1, 'new', 'new', '0', '2024-06-22 21:23:39', '2024-06-22 21:23:39'),
(10, 1, 1, 1, 'opopop', 'opopop', '0', '2024-06-22 21:25:56', '2024-06-22 21:25:56'),
(11, 1, 1, 1, 'opopop', 'opopop', '0', '2024-06-22 21:26:22', '2024-06-22 21:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `project_requests`
--

CREATE TABLE `project_requests` (
  `id` bigint(20) NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `recipient_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_tags`
--

CREATE TABLE `project_tags` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_tags`
--

INSERT INTO `project_tags` (`id`, `project_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 9, 2, '2024-06-22 21:23:39', '2024-06-22 21:23:39'),
(2, 11, 1, '2024-06-22 21:26:22', '2024-06-22 21:26:22'),
(3, 11, 2, '2024-06-22 21:26:22', '2024-06-22 21:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2024-06-22 04:35:01', '2024-06-22 04:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skils`
--

CREATE TABLE `skils` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skils`
--

INSERT INTO `skils` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'react', 'front-end', '2024-06-22 20:42:08', '2024-06-22 20:42:08'),
(3, 'Front_End', 'react', '2024-06-23 02:00:05', '2024-06-23 02:00:05'),
(5, 'Back_End', 'laravel', '2024-06-23 02:17:45', '2024-06-23 02:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` varchar(255) NOT NULL,
  `gpa` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `center_id`, `university_id`, `gpa`, `name`, `email`, `password`, `phone`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '787778', '', 'student', 'student@gmail.com', '$2y$12$rRJg2/n7e50gGm/fcgWBOeCscONi3rRaVPCyKOzaQqazP73LR3Uuu', '200244224', '1719042039.png', '2024-06-22 04:40:39', '2024-06-22 04:40:39'),
(2, 1, '979789789', '', 'mohamad1', 'mohamad1@gmail.com', '$2y$12$n4HL0qDI9qciET.6EZhAOOaqJWFcvstGyOx09wcOTwjKIsvLEzh6e', '855555555', '1719043560.png', '2024-06-22 05:06:00', '2024-06-22 05:06:00'),
(3, 1, '5545454', 'test', 'tewerwrwer', 'tewerwrwer@gmail.com', '$2y$12$pVCOVM85188L.ZqeF2DRzO1/fYOOP8amvB14ifeZRmYcATMbMX3xK', '123123123', '1719102678.png', '2024-06-22 21:31:18', '2024-06-22 21:31:18'),
(4, 1, '2021215', '3', 'abdelrahimahmde', 'abdelrahimahmed@gmail.com', '$2y$12$82JqrewUeqQn9zkf8nIosON/iP7/J.FR6vftC1dsVhxn9XxpnGXGW', '0102102158', '1719118869.png', '2024-06-23 02:01:09', '2024-06-23 02:01:09'),
(5, 2, '20212154', '3', 'ahmed', 'hemona77@gmail.com', '$2y$12$OOPAwUHEV2dug8WQMK9ibOvj38nCWg09FoO3Sa90tV3tzkBF51Sy2', '01012121548', '1719120051.png', '2024-06-23 02:20:51', '2024-06-23 02:20:51'),
(6, 2, '21202454', '3', 'ahmed', 'hemon454@gmail.com', '$2y$12$BF6sEmMFJ3iRW7u/Pmj0BOUGPbg2qdgeuYWMrEdSI3GowRJUECTt.', '021215787', '1719120078.png', '2024-06-23 02:21:18', '2024-06-23 02:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `student_documents`
--

CREATE TABLE `student_documents` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `doc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_projects`
--

CREATE TABLE `student_projects` (
  `id` bigint(20) NOT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `teaching_assistant_id` bigint(20) UNSIGNED NOT NULL,
  `student_team_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_projects`
--

INSERT INTO `student_projects` (`id`, `center_id`, `teaching_assistant_id`, `student_team_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 7, 'new', 'new', '2024-06-22 05:47:22', '2024-06-22 05:47:22'),
(2, 1, 2, 8, 'test', 'test', '2024-06-23 02:19:03', '2024-06-23 02:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `student_skils`
--

CREATE TABLE `student_skils` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `skil_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_skils`
--

INSERT INTO `student_skils` (`id`, `student_id`, `skil_id`, `created_at`, `updated_at`) VALUES
(1, 4, 3, '2024-06-23 02:01:39', '2024-06-23 02:01:39'),
(2, 6, 3, '2024-06-23 02:21:32', '2024-06-23 02:21:32'),
(3, 6, 5, '2024-06-23 02:21:32', '2024-06-23 02:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `student_teams`
--

CREATE TABLE `student_teams` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `teaching_assistant_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_teams`
--

INSERT INTO `student_teams` (`id`, `student_id`, `teaching_assistant_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'new student team', '2024-06-22 04:41:20', '2024-06-22 04:41:20'),
(2, 1, NULL, 'new student team 1', '2024-06-22 04:41:20', '2024-06-22 04:41:20'),
(5, 2, 2, 'test select teaching', '2024-06-22 05:22:21', '2024-06-22 05:22:21'),
(6, 2, 2, 'test select teaching', '2024-06-22 05:22:21', '2024-06-22 05:22:21'),
(7, 2, NULL, 'new', '2024-06-22 05:47:22', '2024-06-22 12:41:28'),
(8, 2, 2, 'test', '2024-06-23 02:19:03', '2024-06-23 02:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `student_team_members`
--

CREATE TABLE `student_team_members` (
  `id` bigint(20) NOT NULL,
  `student_team_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_team_members`
--

INSERT INTO `student_team_members` (`id`, `student_team_id`, `member_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '2024-06-22 05:47:22', '2024-06-22 05:47:22'),
(3, 7, 2, '2024-06-22 12:22:20', '2024-06-22 12:22:20'),
(4, 8, 1, '2024-06-23 02:19:03', '2024-06-23 02:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `studet_tame_tasks`
--

CREATE TABLE `studet_tame_tasks` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `student_tame_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `percentage_completed` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `id` bigint(20) NOT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `university_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`id`, `center_id`, `university_id`, `name`, `email`, `password`, `phone`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, '55555', 'supervisor', 'supervisor@gmail.com', '$2y$12$ozREmqLcNN3GzOP6/rxQV.YO.5weJ4cy8z4oR37IiQQpy/bScfxzm', '0109495264', 'SuperAdmin', '2024-06-22 04:38:51', '2024-06-22 04:38:51'),
(2, 1, '9889888', 'test21', 'test21@gmail.com', '$2y$12$jko.kjpJ2HTmGf95C9Hn.eX17rC8T/jXfHwgLVHcyF2/Zxnhp4iTS', '42343241', NULL, '2024-06-23 01:33:45', '2024-06-23 01:33:45'),
(3, 2, '43243', 'ahmad', 'ahmad@gmail.com', '$2y$12$qtaak8cIQQtAMPfN.RlDk.txqCMql.1U.ANMqBRblA/LeOmJ//R8O', '01067217266', NULL, '2024-06-23 01:35:48', '2024-06-23 01:59:37'),
(4, 1, '9879797', 'mohamad', 'mohamad@gmail.com', '$2y$12$fTBNMygnFeDGJSpei.YT6eIggCAECjGIF3M3HiixEvLe3TxwJYcF6', '101010101', NULL, '2024-06-23 01:39:31', '2024-06-23 01:39:31'),
(6, 2, '201221218', 'ahmed', 'ahmed@gmail.com', '$2y$12$ErfDlTuoazycSRT4jRsXYO8Z08D/C7J3JfWl80DNJXz7PS9O.6S8u', '02121548741', NULL, '2024-06-23 01:43:35', '2024-06-23 01:43:35'),
(7, 2, '20212154', 'mohamed', 'mohamedemad@gmail.com', '$2y$12$jC2E3vXlkjXHyGrCQNHzS.PQ9fZXkZX/u5RlbjNZI8gWx5EI55uSK', '02121545487', NULL, '2024-06-23 01:59:26', '2024-06-23 01:59:26'),
(9, 1, '021215487', 'emad', 'emad@gmail.com', '$2y$12$rvBEW/HQOHZ8oEufDPZSNub1xIGWwu8u3kC8tHavDz8UVm4jSHvPy', '0212154578', NULL, '2024-06-23 02:17:13', '2024-06-23 02:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `teaching__assistants`
--

CREATE TABLE `teaching__assistants` (
  `id` bigint(20) NOT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `university_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teaching__assistants`
--

INSERT INTO `teaching__assistants` (`id`, `center_id`, `supervisor_id`, `university_id`, `name`, `email`, `password`, `phone`, `role`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '544366', 'teaching1', 'teaching1@gmail.com', '$2y$10$3nEEgrMYRHjek3wly/bMqOpBwK8QJijA4ITXtsKEDSD10GvowO9cG', '0101010000', 'SuperAdmin', '2024-06-22 04:39:46', '2024-06-22 04:39:46'),
(2, 1, 1, '0945259340', 'teaching2', 'teaching2@gmail.com', '$2y$10$3nEEgrMYRHjek3wly/bMqOpBwK8QJijA4ITXtsKEDSD10GvowO9cG', '0945259340', 'SuperAdmin', '2024-06-22 05:01:30', '2024-06-22 05:01:30'),
(3, 1, 4, '4234324', 'qqqqqq', 'qqqqqqq@gmail.com', '$2y$12$JDkakUJdJOiAmV5hzvDJWuiDDv27Pi3bV7sPdJTKgjA5Kh7SQ7dJe', '2434224234', NULL, '2024-06-23 01:52:49', '2024-06-23 01:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stuednt_count` varchar(255) NOT NULL DEFAULT '7',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `supervisor_id`, `name`, `stuednt_count`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'team', '10', '2024-06-22 06:07:36', '2024-06-23 02:17:24', '0');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) NOT NULL,
  `center_id` bigint(20) UNSIGNED NOT NULL,
  `supervisor_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_requests`
--

CREATE TABLE `team_requests` (
  `id` bigint(20) NOT NULL,
  `teaching_id` bigint(20) UNSIGNED NOT NULL,
  `student_team_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_requests`
--

INSERT INTO `team_requests` (`id`, `teaching_id`, `student_team_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2024-06-22 04:53:21', '2024-06-22 04:53:21'),
(5, 2, 1, '2024-06-23 02:04:01', '2024-06-23 02:04:01'),
(6, 2, 7, '2024-06-23 02:19:57', '2024-06-23 02:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Mohamad', 'Mohamad', 'admin@gmail.com', '$2y$12$bIsmS7zU9mUKhmdJmvFnQO7dIAa4StdSiO5ukR.2o5akE7RmKS4Ta', 'SuperAdmin', '2024-06-22 04:35:01', '2024-06-22 04:35:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applies`
--
ALTER TABLE `applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_members`
--
ALTER TABLE `apply_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_requests`
--
ALTER TABLE `project_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tags`
--
ALTER TABLE `project_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `skils`
--
ALTER TABLE `skils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_documents`
--
ALTER TABLE `student_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_projects`
--
ALTER TABLE `student_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_skils`
--
ALTER TABLE `student_skils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_teams`
--
ALTER TABLE `student_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_team_members`
--
ALTER TABLE `student_team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studet_tame_tasks`
--
ALTER TABLE `studet_tame_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teaching__assistants`
--
ALTER TABLE `teaching__assistants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_requests`
--
ALTER TABLE `team_requests`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `applies`
--
ALTER TABLE `applies`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `apply_members`
--
ALTER TABLE `apply_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `project_requests`
--
ALTER TABLE `project_requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_tags`
--
ALTER TABLE `project_tags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skils`
--
ALTER TABLE `skils`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_documents`
--
ALTER TABLE `student_documents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_projects`
--
ALTER TABLE `student_projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_skils`
--
ALTER TABLE `student_skils`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_teams`
--
ALTER TABLE `student_teams`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_team_members`
--
ALTER TABLE `student_team_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studet_tame_tasks`
--
ALTER TABLE `studet_tame_tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teaching__assistants`
--
ALTER TABLE `teaching__assistants`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_requests`
--
ALTER TABLE `team_requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
