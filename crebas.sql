/*==============================================================*/
/* dbms name:      sybase sql anywhere 12                       */
/* created on:     28/12/2020 15:13:11                          */
/*==============================================================*/

if exists(select 1 from sys.sysforeignkey where role='fk_jangka_d_relations_tapel') then
    alter table jangka_daftar
       delete foreign key fk_jangka_d_relations_tapel
end if;

if exists(select 1 from sys.sysforeignkey where role='fk_pendafta_relations_ortu') then
    alter table pendaftar
       delete foreign key fk_pendafta_relations_ortu
end if;

if exists(select 1 from sys.sysforeignkey where role='fk_pendafta_relations_wali') then
    alter table pendaftar
       delete foreign key fk_pendafta_relations_wali
end if;

if exists(select 1 from sys.sysforeignkey where role='fk_pendafta_relations_jurusan') then
    alter table pendaftar
       delete foreign key fk_pendafta_relations_jurusan
end if;

if exists(select 1 from sys.sysforeignkey where role='fk_pendafta_relations_tapel') then
    alter table pendaftar
       delete foreign key fk_pendafta_relations_tapel
end if;

if exists(select 1 from sys.sysforeignkey where role='fk_registra_relations_pendafta') then
    alter table registrasi
       delete foreign key fk_registra_relations_pendafta
end if;

if exists(select 1 from sys.sysforeignkey where role='fk_struktur_relations_tapel') then
    alter table struktur
       delete foreign key fk_struktur_relations_tapel
end if;

drop index if exists jangka_daftar.relationship_5_fk;

drop index if exists jangka_daftar.jangka_daftar_pk;

drop table if exists jangka_daftar;

drop index if exists jurusan.jurusan_pk;

drop table if exists jurusan;

drop index if exists ortu.ortu_pk;

drop table if exists ortu;

drop index if exists pendaftar.relationship_7_fk;

drop index if exists pendaftar.relationship_6_fk;

drop index if exists pendaftar.relationship_4_fk;

drop index if exists pendaftar.relationship_3_fk;

drop index if exists pendaftar.pendaftar_pk;

drop table if exists pendaftar;

drop index if exists registrasi.relationship_2_fk;

drop index if exists registrasi.registrasi_pk;

drop table if exists registrasi;

drop index if exists struktur.relationship_8_fk;

drop index if exists struktur.struktur_pk;

drop table if exists struktur;

drop index if exists tapel.tapel_pk;

drop table if exists tapel;

drop index if exists wali.wali_pk;

drop table if exists wali;

/*==============================================================*/
/* table: jangka_daftar                                         */
/*==============================================================*/
create table jangka_daftar
(
   id_jangkar           integer                        not null auto_increment,
   id_tapel             integer                        null,
   mulai                date                           null,
   selesai              date                           null,
   constraint pk_jangka_daftar primary key (id_jangkar)
);

/*==============================================================*/
/* index: jangka_daftar_pk                                      */
/*==============================================================*/
create unique index jangka_daftar_pk on jangka_daftar (
id_jangkar asc
);

/*==============================================================*/
/* index: relationship_5_fk                                     */
/*==============================================================*/
create index relationship_5_fk on jangka_daftar (
id_tapel asc
);

/*==============================================================*/
/* table: jurusan                                               */
/*==============================================================*/
create table jurusan
(
   id_jurusan           integer                        not null auto_increment,
   nama_jurusan         varchar(100)                   null,
   constraint pk_jurusan primary key (id_jurusan)
);

/*==============================================================*/
/* index: jurusan_pk                                            */
/*==============================================================*/
create unique index jurusan_pk on jurusan (
id_jurusan asc
);

/*==============================================================*/
/* table: ortu                                                  */
/*==============================================================*/
create table ortu
(
   id_ortu              integer                        not null auto_increment,
   nama_ayah            varchar(100)                   null,
   pekerjaan_ayah       varchar(100)                   null,
   kebutuhan_khusus_ayah varchar(100)                   null,
   pendidikan_ayah      varchar(100)                   null,
   penghasilan_ayah     varchar(100)                   null,
   nama_ibu             varchar(100)                   null,
   kebutuhan_khusus_ibu varchar(100)                   null,
   pekerjaan_ibu        varchar(100)                   null,
   pendidikan_ibu       varchar(100)                   null,
   penghasilan_ibu      varchar(100)                   null,
   constraint pk_ortu primary key (id_ortu)
);

/*==============================================================*/
/* index: ortu_pk                                               */
/*==============================================================*/
create unique index ortu_pk on ortu (
id_ortu asc
);

/*==============================================================*/
/* table: pendaftar                                             */
/*==============================================================*/
create table pendaftar
(
   id_pendaftar         integer                        not null auto_increment,
   id_tapel             integer                        null,
   id_wali              integer                        null,
   id_ortu              integer                        null,
   id_jurusan           integer                        null,
   nama_lengkap         varchar(200)                   null,
   jk                   varchar(1)                     null,
   nisn                 varchar(20)                    null,
   nis                  varchar(20)                    null,
   no_seri_ijazah       varchar(20)                    null,
   no_seri_skhun        varchar(20)                    null,
   no_un                varchar(20)                    null,
   nik                  varchar(20)                    null,
   npsn_sekolah_asal    varchar(20)                    null,
   tmpt_lahir           varchar(100)                   null,
   tgl_lahir            date                           null,
   agama                varchar(15)                    null,
   berkebutuhan_khusus  varchar(100)                   null,
   alamat_asal          varchar(100)                   null,
   dusun                varchar(100)                   null,
   rt_rw                varchar(10)                    null,
   desa                 varchar(100)                   null,
   kecamatan            varchar(100)                   null,
   kota                 varchar(100)                   null,
   provinsi             varchar(100)                   null,
   jenis_tinggal        varchar(100)                   null,
   no_telp_rumah        varchar(15)                    null,
   no_hp                varchar(15)                    null,
   email                varchar(100)                   null,
   no_kks               varchar(20)                    null,
   no_kps               varchar(20)                    null,
   alasan_layak         long varchar                   null,
   no_kip               varchar(20)                    null,
   nama_kip             varchar(100)                   null,
   alasan_tolak_kip     long varchar                   null,
   no_rek_akta_lahir    varchar(20)                    null,
   lintang              varchar(20)                    null,
   bujur                varchar(20)                    null,
   tinggi_badan         integer                        null,
   berat_badan          integer                        null,
   jarak_sekolah        varchar(10)                    null,
   waktu_tempuh_sekolah time                           null,
   jumlah_saudara       integer                        null,
   constraint pk_pendaftar primary key (id_pendaftar)
);

/*==============================================================*/
/* index: pendaftar_pk                                          */
/*==============================================================*/
create unique index pendaftar_pk on pendaftar (
id_pendaftar asc
);

/*==============================================================*/
/* index: relationship_3_fk                                     */
/*==============================================================*/
create index relationship_3_fk on pendaftar (
id_ortu asc
);

/*==============================================================*/
/* index: relationship_4_fk                                     */
/*==============================================================*/
create index relationship_4_fk on pendaftar (
id_wali asc
);

/*==============================================================*/
/* index: relationship_6_fk                                     */
/*==============================================================*/
create index relationship_6_fk on pendaftar (
id_jurusan asc
);

/*==============================================================*/
/* index: relationship_7_fk                                     */
/*==============================================================*/
create index relationship_7_fk on pendaftar (
id_tapel asc
);

/*==============================================================*/
/* table: registrasi                                            */
/*==============================================================*/
create table registrasi
(
   id_registrasi        integer                        not null auto_increment,
   id_pendaftar         integer                        null,
   tgl_registrasi       date                           null,
   status               varchar(1)                     null,
   constraint pk_registrasi primary key (id_registrasi)
);

/*==============================================================*/
/* index: registrasi_pk                                         */
/*==============================================================*/
create unique index registrasi_pk on registrasi (
id_registrasi asc
);

/*==============================================================*/
/* index: relationship_2_fk                                     */
/*==============================================================*/
create index relationship_2_fk on registrasi (
id_pendaftar asc
);

/*==============================================================*/
/* table: struktur                                              */
/*==============================================================*/
create table struktur
(
   id_struktur          integer                        not null auto_increment,
   id_tapel             integer                        null,
   nama_jabatan         varchar(100)                   null,
   nama_penjabat        varchar(100)                   null,
   constraint pk_struktur primary key (id_struktur)
);

/*==============================================================*/
/* index: struktur_pk                                           */
/*==============================================================*/
create unique index struktur_pk on struktur (
id_struktur asc
);

/*==============================================================*/
/* index: relationship_8_fk                                     */
/*==============================================================*/
create index relationship_8_fk on struktur (
id_tapel asc
);

/*==============================================================*/
/* table: tapel                                                 */
/*==============================================================*/
create table tapel
(
   id_tapel             integer                        not null auto_increment,
   tapel                varchar(100)                   null,
   status               varchar(1)                     null,
   constraint pk_tapel primary key (id_tapel)
);

/*==============================================================*/
/* index: tapel_pk                                              */
/*==============================================================*/
create unique index tapel_pk on tapel (
id_tapel asc
);

/*==============================================================*/
/* table: wali                                                  */
/*==============================================================*/
create table wali
(
   id_wali              integer                        not null auto_increment,
   pekerjaan_wali       varchar(100)                   null,
   pendidikan_wali      varchar(100)                   null,
   penghasilan_wali     varchar(100)                   null,
   constraint pk_wali primary key (id_wali)
);

/*==============================================================*/
/* index: wali_pk                                               */
/*==============================================================*/
create unique index wali_pk on wali (
id_wali asc
);

alter table jangka_daftar
   add constraint fk_jangka_d_relations_tapel foreign key (id_tapel)
      references tapel (id_tapel)
      on update restrict
      on delete restrict;

alter table pendaftar
   add constraint fk_pendafta_relations_ortu foreign key (id_ortu)
      references ortu (id_ortu)
      on update restrict
      on delete restrict;

alter table pendaftar
   add constraint fk_pendafta_relations_wali foreign key (id_wali)
      references wali (id_wali)
      on update restrict
      on delete restrict;

alter table pendaftar
   add constraint fk_pendafta_relations_jurusan foreign key (id_jurusan)
      references jurusan (id_jurusan)
      on update restrict
      on delete restrict;

alter table pendaftar
   add constraint fk_pendafta_relations_tapel foreign key (id_tapel)
      references tapel (id_tapel)
      on update restrict
      on delete restrict;

alter table registrasi
   add constraint fk_registra_relations_pendafta foreign key (id_pendaftar)
      references pendaftar (id_pendaftar)
      on update restrict
      on delete restrict;

alter table struktur
   add constraint fk_struktur_relations_tapel foreign key (id_tapel)
      references tapel (id_tapel)
      on update restrict
      on delete restrict;


