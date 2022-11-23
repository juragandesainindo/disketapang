<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '4',
            'name' => '4',
            'telepon' => '4',
            'status' => '4',
            'role_name' => '4',
            'email' => '4',
            'password' => '4',
        ]);
    }
}

(4, 'Kasub Bagian Umum', '-', 1, 'Kasub Bagian Umum', 'umum@gmail.com', NULL, '$2y$10$hy3LBuc7SxpGnLrjKCOiEeJ3gMwHJljjj205n0OUDxP.fO1kCjMoW', NULL, '2021-06-17 00:14:15', '2022-07-20 05:19:39'),
	(8, 'Administrator', '-', 1, 'Super Admin', 'super-admin@gmail.com', NULL, '$2y$10$/lhGT3Q9n6Zjd/XKOENOROUkIY5SNb8UKYyqOYlklecR9TdvzX26K', 'WkTgAcdy7BeCeL5OI4v7bRnWh04wMhlycKvHDeGVqAZhOljkiksUwkIRlRyo', '2021-07-07 07:57:07', '2022-07-21 01:43:42'),
	(10, 'Kasub Bagian Keuangan', '-', 1, 'Kasub Bagian Keuangan', 'keuangan@gmail.com', NULL, '$2y$10$WDl0DH/kPv8PMwP2k/U6w.bli3pZ/CEgJNJsF4v9ERopqYeSmIyiS', NULL, '2021-07-10 14:46:17', '2021-08-26 07:49:26'),
	(14, 'Kasi Kerawanan Pangan', '08126861361', 1, 'Kasi Kerawanan Pangan', 'miharlinajaa123@gmail.com', NULL, '$2y$10$6EukAfCPzTJSkSlWrS9akuAcLWpXC3urphZ1itgCSFu.8xt8b8Ijy', NULL, '2021-08-19 04:14:12', '2021-08-23 15:40:07'),
	(15, 'Kasi Sumber Daya Pangan', '081365247910', 1, 'Kasi Sumber Daya Pangan', 'susy.indri75@gmail.com', NULL, '$2y$10$Z0IoLAYzTCvFBLqDP3TYNeYIPuimmYJcS.yeQeAvp3plri5bROGYq', NULL, '2021-08-19 04:28:39', '2021-08-23 15:39:45'),
	(16, 'Kasi Keamanan Pangan', '085278106045', 1, 'Kasi Keamanan Pangan', 'ceriadona81@gmail.com', NULL, '$2y$10$hdTOzWQ40susmR2S1Ih5yO2aCDe1uVc23tcmnFMJ3W2KSZ7EHlwlG', NULL, '2021-08-19 07:31:35', '2021-08-23 15:39:18'),
	(17, 'Kasi Konsumsi Pangan', '081275701371', 1, 'Kasi Konsumsi Pangan', 'ismailrafirima76@gmail.com', NULL, '$2y$10$4SPmdcqw0LW/IVEM/xN3euihDSzAKbbg1Z7I9Ec2UD6c7V5lEJRB6', NULL, '2021-08-21 20:05:47', '2021-08-23 15:41:15'),
	(18, 'Kasi Penganekaragaman Konsumsi Pangan', '08228238249289', 1, 'Kasi Penganekaragaman Konsumsi Pangan', 'dewirezeki7474@gmail.com', NULL, '$2y$10$5Qenfxh2rBGu5RHBUx5f6.nY2JrnU0E1DnQvMxfpVlamFQ3TKCBoK', NULL, '2021-08-21 20:10:12', '2021-08-23 15:41:05'),
	(21, 'Kepala Dinas Ketahanan Pangan', '082384171977', 1, 'Kadis Ketapang', 'alek.kurniawan20@gmail.com', NULL, '$2y$10$K7EFfMStQzkCDSP0yj.So.V5krPv5An/cjQXDIY5eGDynmPhLlBF6', NULL, '2021-08-23 15:20:10', '2021-08-23 15:20:10'),
	(23, 'Kabid Ketersediaan dan Kerawanan Pangan', '-', 1, 'Kabid Ketersediaan dan Kerawanan Pangan', 'kabid.ketersediaan@gmail.com', NULL, '$2y$10$lgvXL06WGWEmjU2CpwSpPepHbheX/Rxitm2Arfi65hQn8pMK4i/Ri', NULL, '2021-08-23 15:32:29', '2021-08-23 15:32:29'),
	(24, 'Kabid Distribusi dan Cadangan Pangan', '-', 1, 'Kabid Distribusi dan Cadangan Pangan', 'kabid.distribusi@gmail.com', NULL, '$2y$10$wgvuIWgxl9ttwoeb3j9dUe0j3XIgJowqkKz/uLonB89l0Xa6aw4Sq', NULL, '2021-08-23 15:33:08', '2021-08-23 15:33:08'),
	(25, 'Kabid Konsumsi dan Keamanan Pangan', '-', 1, 'Kabid Konsumsi dan Keamanan Pangan', 'kabid.konsumsi@gmail.com', NULL, '$2y$10$aF986NxE19y02uSCfO3DqexSCg6PSWThnvVyzMETU7DGemxZd/lq.', NULL, '2021-08-23 15:33:50', '2021-08-23 15:33:50'),
	(26, 'Kasi Ketersediaan Pangan', '-', 1, 'Kasi Ketersediaan Pangan', 'kasi-ketersediaan@gmail.com', NULL, '$2y$10$ip5VogDbVwfhXbJohdKivOSKQ8gtdvYqOz5AXqO3nkcfZ8TTe25Lu', NULL, '2021-08-23 15:35:17', '2021-08-23 15:35:17'),
	(27, 'Kasi Distribusi Pangan', '-', 1, 'Kasi Distribusi Pangan', 'zulmaniah1979@gmail.com', NULL, '$2y$10$SX/u3jNv.MZ0bKUn2LjyzuWsndkvMfA4HFYG4khvcwfts8C/5Nc/S', NULL, '2021-08-23 15:36:15', '2021-08-24 11:01:15'),
	(28, 'Kasi Harga Pangan', '-', 1, 'Kasi Harga Pangan', 'arpispku@gmail.com', NULL, '$2y$10$gBlVSeQrfbLPmuT7pSj1fORDxIuiTS7wDWuTuZrULRSSAnENneMbq', NULL, '2021-08-23 15:37:25', '2021-08-24 11:00:27'),
	(29, 'Kasi Cadangan Pangan', '-', 1, 'Kasi Cadangan Pangan', 'iwanknoor16@gmail.com', NULL, '$2y$10$d9gkQwnLb4j7TSHZWwvdguvsKRTq/drr.WaRdsoJExJUr0K5T7OTm', NULL, '2021-08-23 15:38:05', '2021-08-24 11:16:12'),
	(30, 'Kasubag Umum', '081200000000', 1, 'Kasub Bagian Umum', 'kasum@gmail.com', NULL, '$2y$10$/9Sfj/o8rp2AzugBIs3MAeCcfGLPvhllp3TdQQz34DN.Jxl37Pgtu', NULL, '2022-07-21 01:39:07', '2022-07-21 01:39:07'),
	(31, 'administrator', '081200000000', 1, 'Super Admin', 'admin@sitangan.com', NULL, '$2y$10$NTYxmgeKObNHfFaGRCO1YuOgSr31Cvj1OIOa70QKliqgzaLXqHkXS', 'SMU7vsYnPN2GtfMPBUTMU6pxQopn4NruvW1FRBS3lmFkYleWIPXrUYpGgiKf', '2022-07-21 01:41:55', '2022-07-21 01:45:08'),
	(32, 'admin', '098', 1, 'Super Admin', 'admin1337@gmail.com', NULL, '$2y$10$kUXEC3o63WkAIehP8kdko.5OdEzy5zB0v/v9TWzkvb23MEgRj4egW', '9cMnMBiOoYyviUApKcUMmuqLwi6JmHPTHMlgICa9G8FX75WO8Xv9314eCwTC', '2022-08-21 16:51:45', '2022-10-13 06:35:17'),
	(33, 'Khairunas', '081275532603', 1, 'Kasub Bagian Keuangan', 'kasuke@sitangan.com', NULL, '$2y$10$NCDThkyF80abIcdXUoxij.Z31OceVZBOsatZI8vFAi8fzO/qyOUiW', NULL, '2022-11-02 02:13:34', '2022-11-02 02:13:34');