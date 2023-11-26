"use strict";
// Class definition

var baseUrl = document.body.getAttribute('data-baseurl');

var KTDefaultDatatableDemo = function () {
	var datatable; // Variabel untuk menyimpan instance DataTable
	// Private functions
	var alumniTable = function () {
		var options = {
			data: {
				type: 'remote',
				source: {
					read: {
						url: 'http://localhost:8080/api-v2/alumni',
					},
				},
				serverPaging: true,
				serverFiltering: true,
				serverSorting: true,
				pageSize: 20,
			},
			layout: {
				scroll: true, // enable/disable datatable scroll both horizontal and vertical when needed.
				height: 550, // datatable's body's fixed height
				footer: false, // display/hide footer
				responsive: true, // datatable is responsive
			},
			sortable: true,
			pagination: true,
			search: {
				input: $('#kt_datatable_alumni_search_query'),
				key: 'generalSearch'
			},
			columns: [
				{
					field: 'RecordID',
					title: '#',
					sortable: false,
					width: 30,
					type: 'number',
					selector: { class: 'kt-checkbox--solid' },
					textAlign: 'center',
				}, {
					field: 'nim',
					title: 'NIM',
					width: 30,
					type: 'number',
					template: function (row) {
						return row.nim;
					},
				}, {
					field: 'nama',
					title: 'Nama',
				}, {
					field: 'kode_prodi',
					title: 'Kode Prodi',
				}, {
					field: 'jenis_keluar',
					title: 'Jenis Keluar',
				}, {
					field: 'tanggal_keluar',
					title: 'Tanggal Keluar',
					type: 'date',
					format: 'MM/DD/YYYY',
				}, {
					field: 'tahun_masuk',
					title: 'Tahun Masuk',
				}, {
					field: 'tahun_keluar',
					title: 'Tahun Keluar',
				}, {
					field: 'semester_keluar',
					title: 'Semester Keluar',
				}, {
					field: 'ip_kumulatif',
					title: 'IP Kumulatif',
				}, {
					field: 'nomor_seri_ijazah',
					title: 'Nomor Seri Ijazah',
				}, {
					field: 'judul_tugas_akhir',
					title: 'Judul Tugas Akhir',
				}, {
					field: 'pembimbing_satu',
					title: 'Pembimbing Satu',
				}, {
					field: 'pembibing_dua',
					title: 'Pembimbing Dua',
				}, {
					field: 'pembimbing_tiga',
					title: 'Pembimbing Tiga',
				}, {
					field: 'penguji_satu',
					title: 'Penguji Satu',
				}, {
					field: 'penguji_dua',
					title: 'Penguji Dua',
				}, {
					field: 'penguji_tiga',
					title: 'Penguji Tiga',
				}, {
					field: 'nomor_sk_tugas',
					title: 'Nomor SK Tugas',
				}, {
					field: 'tanggal_sk_tugas',
					title: 'Tanggal SK Tugas',
				}, {
					field: 'keterangan',
					title: 'Keterangan',
				}, {
					field: 'Actions',
					title: 'Actions',
					sortable: false,
					width: 125,
					overflow: 'visible',
					autoHide: false,
					template: function (row) {
						return '\
							<a href="'+ baseUrl + 'alumni/edit/' + row.id + '" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="la la-edit"></i>\
							</a>\
							<a href="'+ baseUrl + 'alumni/delete/' + row.id + '" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="la la-trash"></i>\
							</a>\
						';
					},
				}],
		};

		datatable = $('#kt_datatable_alumni').KTDatatable(options);


	};

	var eventsCapture = function () {
		$('#kt_datatable_alumni').on('datatable-on-goto-page', function (e, args) {
			var currentPage = args.page;
			datatable.setDataSourceParam('page', currentPage);
			datatable.reload();
		});
	};

	return {
		// public functions
		init: function () {
			alumniTable();
			eventsCapture();
		},
	};
}();

jQuery(document).ready(function () {
	KTDefaultDatatableDemo.init();
});
