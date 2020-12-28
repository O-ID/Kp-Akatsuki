/*==============================================================*/
/* DBMS name:      Sybase SQL Anywhere 12                       */
/* Created on:     28/12/2020 15:13:11                          */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='FK_JANGKA_D_RELATIONS_TAPEL') then
    alter table JANGKA_DAFTAR
       delete foreign key FK_JANGKA_D_RELATIONS_TAPEL
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_PENDAFTA_RELATIONS_ORTU') then
    alter table PENDAFTAR
       delete foreign key FK_PENDAFTA_RELATIONS_ORTU
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_PENDAFTA_RELATIONS_WALI') then
    alter table PENDAFTAR
       delete foreign key FK_PENDAFTA_RELATIONS_WALI
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_PENDAFTA_RELATIONS_JURUSAN') then
    alter table PENDAFTAR
       delete foreign key FK_PENDAFTA_RELATIONS_JURUSAN
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_PENDAFTA_RELATIONS_TAPEL') then
    alter table PENDAFTAR
       delete foreign key FK_PENDAFTA_RELATIONS_TAPEL
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_REGISTRA_RELATIONS_PENDAFTA') then
    alter table REGISTRASI
       delete foreign key FK_REGISTRA_RELATIONS_PENDAFTA
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_STRUKTUR_RELATIONS_TAPEL') then
    alter table STRUKTUR
       delete foreign key FK_STRUKTUR_RELATIONS_TAPEL
end if;

drop index if exists JANGKA_DAFTAR.RELATIONSHIP_5_FK;

drop index if exists JANGKA_DAFTAR.JANGKA_DAFTAR_PK;

drop table if exists JANGKA_DAFTAR;

drop index if exists JURUSAN.JURUSAN_PK;

drop table if exists JURUSAN;

drop index if exists ORTU.ORTU_PK;

drop table if exists ORTU;

drop index if exists PENDAFTAR.RELATIONSHIP_7_FK;

drop index if exists PENDAFTAR.RELATIONSHIP_6_FK;

drop index if exists PENDAFTAR.RELATIONSHIP_4_FK;

drop index if exists PENDAFTAR.RELATIONSHIP_3_FK;

drop index if exists PENDAFTAR.PENDAFTAR_PK;

drop table if exists PENDAFTAR;

drop index if exists REGISTRASI.RELATIONSHIP_2_FK;

drop index if exists REGISTRASI.REGISTRASI_PK;

drop table if exists REGISTRASI;

drop index if exists STRUKTUR.RELATIONSHIP_8_FK;

drop index if exists STRUKTUR.STRUKTUR_PK;

drop table if exists STRUKTUR;

drop index if exists TAPEL.TAPEL_PK;

drop table if exists TAPEL;

drop index if exists WALI.WALI_PK;

drop table if exists WALI;

/*==============================================================*/
/* Table: JANGKA_DAFTAR                                         */
/*==============================================================*/
create table JANGKA_DAFTAR 
(
   ID_JANGKAR           integer                        not null,
   ID_TAPEL             integer                        null,
   MULAI                date                           null,
   SELESAI              date                           null,
   constraint PK_JANGKA_DAFTAR primary key (ID_JANGKAR)
);

/*==============================================================*/
/* Index: JANGKA_DAFTAR_PK                                      */
/*==============================================================*/
create unique index JANGKA_DAFTAR_PK on JANGKA_DAFTAR (
ID_JANGKAR ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_5_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_5_FK on JANGKA_DAFTAR (
ID_TAPEL ASC
);

/*==============================================================*/
/* Table: JURUSAN                                               */
/*==============================================================*/
create table JURUSAN 
(
   ID_JURUSAN           integer                        not null,
   NAMA_JURUSAN         varchar(100)                   null,
   constraint PK_JURUSAN primary key (ID_JURUSAN)
);

/*==============================================================*/
/* Index: JURUSAN_PK                                            */
/*==============================================================*/
create unique index JURUSAN_PK on JURUSAN (
ID_JURUSAN ASC
);

/*==============================================================*/
/* Table: ORTU                                                  */
/*==============================================================*/
create table ORTU 
(
   ID_ORTU              integer                        not null,
   NAMA_AYAH            varchar(100)                   null,
   PEKERJAAN_AYAH       varchar(100)                   null,
   KEBUTUHAN_KHUSUS_AYAH varchar(100)                   null,
   PENDIDIKAN_AYAH      varchar(100)                   null,
   PENGHASILAN_AYAH     varchar(100)                   null,
   NAMA_IBU             varchar(100)                   null,
   KEBUTUHAN_KHUSUS_IBU varchar(100)                   null,
   PEKERJAAN_IBU        varchar(100)                   null,
   PENDIDIKAN_IBU       varchar(100)                   null,
   PENGHASILAN_IBU      varchar(100)                   null,
   constraint PK_ORTU primary key (ID_ORTU)
);

/*==============================================================*/
/* Index: ORTU_PK                                               */
/*==============================================================*/
create unique index ORTU_PK on ORTU (
ID_ORTU ASC
);

/*==============================================================*/
/* Table: PENDAFTAR                                             */
/*==============================================================*/
create table PENDAFTAR 
(
   ID_PENDAFTAR         integer                        not null,
   ID_TAPEL             integer                        null,
   ID_WALI              integer                        null,
   ID_ORTU              integer                        null,
   ID_JURUSAN           integer                        null,
   NAMA_LENGKAP         varchar(200)                   null,
   JK                   varchar(1)                     null,
   NISN                 varchar(20)                    null,
   NIS                  varchar(20)                    null,
   NO_SERI_IJAZAH       varchar(20)                    null,
   NO_SERI_SKHUN        varchar(20)                    null,
   NO_UN                varchar(20)                    null,
   NIK                  varchar(20)                    null,
   NPSN_SEKOLAH_ASAL    varchar(20)                    null,
   TMPT_LAHIR           varchar(100)                   null,
   TGL_LAHIR            date                           null,
   AGAMA                varchar(15)                    null,
   BERKEBUTUHAN_KHUSUS  varchar(100)                   null,
   ALAMAT_ASAL          varchar(100)                   null,
   DUSUN                varchar(100)                   null,
   RT_RW                varchar(10)                    null,
   DESA                 varchar(100)                   null,
   KECAMATAN            varchar(100)                   null,
   KOTA                 varchar(100)                   null,
   PROVINSI             varchar(100)                   null,
   JENIS_TINGGAL        varchar(100)                   null,
   NO_TELP_RUMAH        varchar(15)                    null,
   NO_HP                varchar(15)                    null,
   EMAIL                varchar(100)                   null,
   NO_KKS               varchar(20)                    null,
   NO_KPS               varchar(20)                    null,
   ALASAN_LAYAK         long varchar                   null,
   NO_KIP               varchar(20)                    null,
   NAMA_KIP             varchar(100)                   null,
   ALASAN_TOLAK_KIP     long varchar                   null,
   NO_REK_AKTA_LAHIR    varchar(20)                    null,
   LINTANG              varchar(20)                    null,
   BUJUR                varchar(20)                    null,
   TINGGI_BADAN         integer                        null,
   BERAT_BADAN          integer                        null,
   JARAK_SEKOLAH        varchar(10)                    null,
   WAKTU_TEMPUH_SEKOLAH time                           null,
   JUMLAH_SAUDARA       integer                        null,
   constraint PK_PENDAFTAR primary key (ID_PENDAFTAR)
);

/*==============================================================*/
/* Index: PENDAFTAR_PK                                          */
/*==============================================================*/
create unique index PENDAFTAR_PK on PENDAFTAR (
ID_PENDAFTAR ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_3_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_3_FK on PENDAFTAR (
ID_ORTU ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_4_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_4_FK on PENDAFTAR (
ID_WALI ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_6_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_6_FK on PENDAFTAR (
ID_JURUSAN ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_7_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_7_FK on PENDAFTAR (
ID_TAPEL ASC
);

/*==============================================================*/
/* Table: REGISTRASI                                            */
/*==============================================================*/
create table REGISTRASI 
(
   ID_REGISTRASI        integer                        not null,
   ID_PENDAFTAR         integer                        null,
   TGL_REGISTRASI       date                           null,
   STATUS               varchar(1)                     null,
   constraint PK_REGISTRASI primary key (ID_REGISTRASI)
);

/*==============================================================*/
/* Index: REGISTRASI_PK                                         */
/*==============================================================*/
create unique index REGISTRASI_PK on REGISTRASI (
ID_REGISTRASI ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_2_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_2_FK on REGISTRASI (
ID_PENDAFTAR ASC
);

/*==============================================================*/
/* Table: STRUKTUR                                              */
/*==============================================================*/
create table STRUKTUR 
(
   ID_STRUKTUR          integer                        not null,
   ID_TAPEL             integer                        null,
   NAMA_JABATAN         varchar(100)                   null,
   NAMA_PENJABAT        varchar(100)                   null,
   constraint PK_STRUKTUR primary key (ID_STRUKTUR)
);

/*==============================================================*/
/* Index: STRUKTUR_PK                                           */
/*==============================================================*/
create unique index STRUKTUR_PK on STRUKTUR (
ID_STRUKTUR ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_8_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_8_FK on STRUKTUR (
ID_TAPEL ASC
);

/*==============================================================*/
/* Table: TAPEL                                                 */
/*==============================================================*/
create table TAPEL 
(
   ID_TAPEL             integer                        not null,
   TAPEL                varchar(100)                   null,
   STATUS               varchar(1)                     null,
   constraint PK_TAPEL primary key (ID_TAPEL)
);

/*==============================================================*/
/* Index: TAPEL_PK                                              */
/*==============================================================*/
create unique index TAPEL_PK on TAPEL (
ID_TAPEL ASC
);

/*==============================================================*/
/* Table: WALI                                                  */
/*==============================================================*/
create table WALI 
(
   ID_WALI              integer                        not null,
   PEKERJAAN_WALI       varchar(100)                   null,
   PENDIDIKAN_WALI      varchar(100)                   null,
   PENGHASILAN_WALI     varchar(100)                   null,
   constraint PK_WALI primary key (ID_WALI)
);

/*==============================================================*/
/* Index: WALI_PK                                               */
/*==============================================================*/
create unique index WALI_PK on WALI (
ID_WALI ASC
);

alter table JANGKA_DAFTAR
   add constraint FK_JANGKA_D_RELATIONS_TAPEL foreign key (ID_TAPEL)
      references TAPEL (ID_TAPEL)
      on update restrict
      on delete restrict;

alter table PENDAFTAR
   add constraint FK_PENDAFTA_RELATIONS_ORTU foreign key (ID_ORTU)
      references ORTU (ID_ORTU)
      on update restrict
      on delete restrict;

alter table PENDAFTAR
   add constraint FK_PENDAFTA_RELATIONS_WALI foreign key (ID_WALI)
      references WALI (ID_WALI)
      on update restrict
      on delete restrict;

alter table PENDAFTAR
   add constraint FK_PENDAFTA_RELATIONS_JURUSAN foreign key (ID_JURUSAN)
      references JURUSAN (ID_JURUSAN)
      on update restrict
      on delete restrict;

alter table PENDAFTAR
   add constraint FK_PENDAFTA_RELATIONS_TAPEL foreign key (ID_TAPEL)
      references TAPEL (ID_TAPEL)
      on update restrict
      on delete restrict;

alter table REGISTRASI
   add constraint FK_REGISTRA_RELATIONS_PENDAFTA foreign key (ID_PENDAFTAR)
      references PENDAFTAR (ID_PENDAFTAR)
      on update restrict
      on delete restrict;

alter table STRUKTUR
   add constraint FK_STRUKTUR_RELATIONS_TAPEL foreign key (ID_TAPEL)
      references TAPEL (ID_TAPEL)
      on update restrict
      on delete restrict;

