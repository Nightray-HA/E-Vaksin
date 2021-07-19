/*==============================================================*/
/* DBMS name:      MySQL 4.0                                    */
/* Created on:     7/13/2021 10:04:34 AM                        */
/*==============================================================*/


drop table if exists ADMIN;

drop index RELATIONSHIP_1_FK on PESERTA;

drop table if exists PESERTA;

drop table if exists SESI;

/*==============================================================*/
/* Table: ADMIN                                                 */
/*==============================================================*/
create table ADMIN
(
   USERNAME                       varchar(32)                    not null,
   PASSWORD                       varchar(32),
   NAMA_ADMIN                     varchar(255),
   primary key (USERNAME)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Table: PESERTA                                               */
/*==============================================================*/
create table PESERTA
(
   NIK                            varchar(20)                    not null,
   ID_SESI                        int                            not null,
   NAMA_PESERTA                   varchar(255),
   NOHP                           varchar(14),
   T                              varchar(50),
   TL                             date,
   KTP                            text,
   KEL                            varchar(50),
   KEC                            varchar(50),
   KOTAKAB                        varchar(50),
   PROV                           varchar(50),
   DOM                            text,
   JK                             varchar(10),
   COVID                          varchar(5),
   HIPERTENSI                     varchar(5),
   DIABETES                       varchar(5),
   JANTUNG                        varchar(5),
   PARU                           varchar(5),
   KANKER                         varchar(5),
   HAMIL                          varchar(5),
   MENYUSUI                       varchar(5),
   LAIN                           text,
   TGL                            date,
   TGL2                           date,
   DOS1                           text,
   DOS2                           text,
   HADIR                          int, 
   primary key (NIK)
)
ENGINE = InnoDB;

/*==============================================================*/
/* Index: RELATIONSHIP_1_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_1_FK on PESERTA
(
   ID_SESI
);

/*==============================================================*/
/* Table: SESI                                                  */
/*==============================================================*/
create table SESI
(
   ID_SESI                        int                            not null,
   WAKTU_SESI                     varchar(16),
   primary key (ID_SESI)
)
ENGINE = InnoDB;

alter table PESERTA add constraint FK_RELATIONSHIP_1 foreign key (ID_SESI)
      references SESI (ID_SESI) on delete restrict on update restrict;

