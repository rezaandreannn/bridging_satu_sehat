
## Menampilkan data pasien 

#### Fungsi : menampilkan data pasien total 1000 order by desc

```sql
SELECT TOP 1000
	NOID as id,
	No_MR AS no_mr,
	Nama_Pasien AS nama_pasien,
	No_Identitas AS no_bpjs,
	HP2 AS nik,
	COALESCE(Telp_Rumah, HP1) as no_hp,
	Tgl_Lahir AS tanggal_lahir,
	Jenis_Kelamin AS jenis_kelamin,
FROM
	REGISTER_PASIEN rp
ORDER BY
	Tgl_Register DESC;
```

#### Fungsi filter data by(no mr, no bpjs, nik, nama)

```sql
SELECT TOP 1000
	NOID as id,
	No_MR AS no_mr,
	Nama_Pasien AS nama_pasien,
	No_Identitas AS no_bpjs,
	HP2 AS nik,
	COALESCE(Telp_Rumah, HP1) as no_hp,
	Tgl_Lahir AS tanggal_lahir,
	Jenis_Kelamin AS jenis_kelamin,
FROM
	REGISTER_PASIEN rp
WHERE
	No_MR = '214942' AND
	HP2 = '1807062203970004' AND
	No_Identitas = '0000034807678' AND
	Nama_Pasien LIKE '%reza%'
ORDER BY
	Tgl_Register DESC;
```


#### Find by ID

```sql
SELECT

	No_MR AS no_mr,
	Nama_Pasien AS nama_pasien,
	Tgl_Register AS tanggal_register,
	No_Identitas AS no_bpjs,
	HP2 AS nik,
	COALESCE(Telp_Rumah, HP1) as no_hp,
	Tgl_Lahir AS tanggal_lahir,
	Jenis_Kelamin AS jenis_kelamin,
	Agama AS agama,
	Warga_Negara AS warga_negara,
	Pekerjaan AS pekerjaan,
	Status_Nikah AS status_kawin,
	Alamat AS alamat,
	Provinsi AS provinsi,
	Kota AS kota,
	Kode_Pos AS kode_pos
FROM
	REGISTER_PASIEN rp
WHERE
	NOID = '788988';
```


## Get data by pendaftaran hari ini

#### Fungsi : untuk mendapatkan data register yg mendaftar hari ini

```sql
SELECT
	rp.No_MR AS no_mr,
	rp.Nama_Pasien AS nama_pasien,
	rp.Tgl_Register AS tanggal_register,
	rp.No_Identitas AS no_bpjs,
	rp.HP2 AS nik,
	COALESCE(rp.Telp_Rumah, rp.HP1) as no_hp,
	rp.Tgl_Lahir AS tanggal_lahir,
	rp.Jenis_Kelamin AS jenis_kelamin,
	rp.Agama AS agama,
	rp.Warga_Negara AS warga_negara,
	rp.Pekerjaan AS pekerjaan,
	rp.Status_Nikah AS status_kawin,
	rp.Alamat AS alamat,
	rp.Provinsi AS provinsi,
	rp.Kota AS kota,
	rp.Kode_Pos AS kode_pos
FROM
	REGISTER_PASIEN rp
LEFT JOIN
	PENDAFTARAN p ON p.No_MR = rp.No_MR
WHERE
	p.Tanggal = '2024-02-28'
ORDER BY
	rp.No_MR ;
```


