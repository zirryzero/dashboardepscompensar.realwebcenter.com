-- Dashboard EPS Compensar Database Schema
-- Clean DDL schema without sensitive data / records

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `auth_groups_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `auth_identities` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `auth_permissions_users` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `auth_remember_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `auth_token_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `citas futuras` (
  `Fecha Citacion` text,
  `Caso` text,
  `Hora de una citación` text,
  `Indicador anulación` text,
  `Fecha de anulación` text,
  `Cod Aseguradora-IS-H` text,
  `Nombre completo` text,
  `Paciente` text,
  `Num. Identificacion` int DEFAULT NULL,
  `Nombre completo_1` text,
  `Fecha Nacimiento` int DEFAULT NULL,
  `Sede de U.O.` text,
  `Prestación` text,
  `Interloc.comercial` int DEFAULT NULL,
  `Int` text,
  `Nombre completo_2` text,
  `IC: Número ID` int DEFAULT NULL,
  `Creado por` int DEFAULT NULL,
  `Nombre usuario gener` text,
  `Codigo usuario que g` int DEFAULT NULL,
  `Prestación_3` text,
  `Nombre prestacion` text,
  `Unidad organizativa` text,
  `Centro de coste` text,
  `espe sede` text,
  `Cantidad registros` int DEFAULT NULL,
  `Contador de Citas` int DEFAULT NULL,
  `Dista.max.citacion` int DEFAULT NULL,
  `Dista.min.citacion` int DEFAULT NULL,
  `Fec. Solicitud Cita` int DEFAULT NULL,
  `Duracion.citacion` int DEFAULT NULL,
  `Fec. asignación cita` int DEFAULT NULL,
  `Especialidad` text,
  `Plan` text,
  `CC Profesional` int DEFAULT NULL,
  `NEGOCIO` text,
  `PRESTACION NOMBRE` text,
  `SEDE` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `contratacion mensual` (
  `CARGO` text,
  `CALLE 26` int DEFAULT NULL,
  `CALLE 42` int DEFAULT NULL,
  `CALLE 94` int DEFAULT NULL,
  `CALLE 134` int DEFAULT NULL,
  `CALLE 153` int DEFAULT NULL,
  `1° DE MAYO` int DEFAULT NULL,
  `AUTOPISTA` int DEFAULT NULL,
  `CHIA` int DEFAULT NULL,
  `EAAB` int DEFAULT NULL,
  `SANTA LUCIA` int DEFAULT NULL,
  `USAQUEN` int DEFAULT NULL,
  `FACA` int DEFAULT NULL,
  `FONTI` int DEFAULT NULL,
  `KENNEDY` int DEFAULT NULL,
  `SUBA` int DEFAULT NULL,
  `CENTRO MAYOR` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `gestion` (
  `Incident ID Publico` int DEFAULT NULL,
  `Fecha de Creación Caso` text,
  `Hora de Creación Caso` text,
  `Nombre del solicitante` text,
  `No de Contacto` int DEFAULT NULL,
  `Tipo de Novedad Calculado` text,
  `Objeto de Planificación` text,
  `Sede` text,
  `Negocio` text,
  `Profesional` text,
  `VMA` int DEFAULT NULL,
  `Unidad de Edificio` text,
  `Motivo de Solicitud` text,
  `Radicado en Kactus / MIS` text,
  `Fecha Inicio` text,
  `Fecha Fin` text,
  `Dia` text,
  `Hora de Inicio` text,
  `Hora Fin` text,
  `No Sobrecargas` text,
  `Tipo de Planificacion` text,
  `Especialidad` text,
  `Descripción Solicitante` text,
  `Estado de Solicitud` text,
  `Detalle de Inconsistencia` text,
  `Clasificacion de Inconsistencia` text,
  `Observaciones` text,
  `Fecha de Resuelto` text,
  `Hora de Resuelto` text,
  `Resolutor` text,
  `Observaciones de Resuelto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `oferta` (
  `CeSa` int DEFAULT NULL,
  `Sede` text,
  `Uni.Médica` text,
  `Uni.Trata` text,
  `Obj.pl.` int DEFAULT NULL,
  `Persona` text,
  `Uni.Edif` text,
  `Progr.sem.` text,
  `Progr.día` text,
  `Fe.Dispo` text,
  `Horario Disponible` text,
  `Jornada` text,
  `Tp.planif.` text,
  `Nºmáx.cit.` int DEFAULT NULL,
  `Sala` text,
  `Fecha de Reporte` text,
  `Especialidad` text,
  `Disponible` text,
  `Sede2` text,
  `Plan` text,
  `CC Profesional` int DEFAULT NULL,
  `nomplani` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `group` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `auth_groups_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `auth_identities`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `auth_permissions_users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `auth_token_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

COMMIT;
