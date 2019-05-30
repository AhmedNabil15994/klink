@extends('backend.adminlte.documents.index')



@section('contract')
<style type="text/css">
.first-div{
	padding: 20px;
	padding-bottom:0;
}
.company-info {
	padding: 10px;
	clear: both;
	padding-bottom: 0;
	margin-bottom: 50px;
}
.company-info .company-name {
	cursor: pointer;
	float: left;
	width: 100%;
}

.company-info .company-name h2,
.invoice-number h4 {
	font-weight: 700;
	font-size: 26px;
	text-transform: uppercase;
	margin-bottom: 20px;
	color: #444;
}
.invoice-number h4{
	font-size: 20px;
}
.company-info .company-name p,
.invoice-number p.title{
	font-weight: 700;
	font-size: 16px;
	cursor: pointer;
	color: #666;
	text-transform: uppercase;
}
.invoice-number .row.p-data{
	color: #666;
}
.company-info .company-info {
	float: right;
}

.company-info .company-info span {
	display: block;
	margin-bottom: 2px;
	font-size: 14px;
	cursor: pointer;
	color: #666;
}

.invoice-number {
	padding: 10px;
	cursor: pointer;
	padding-top: 0;
}
.invoice-number span {
	font-size: 15px;
	color: #777;
}
.invoice-number h6{
	font-size: 16px;
}
.invoice-number.last .row{
	margin-bottom: 0;
}
a#customer_address{
	max-width: 140px;
	display: inherit;
	margin: auto;
}
.pag{
	padding-bottom: 0;
}
.col-xs-6.sign{
	width: 50%;
	padding: 0;
	margin-top: 15px;
}
.col-xs-6.sign .border{
	width: 50%;
	padding-top: 5px;
	border-top:1px dashed #999;
}
@media print{
	.actions,.main-footer{
		display: none;
	}
	.tab-content,.pag{
		border:0;
	}
	.editable-click, a.editable-click, a.editable-click:hover{
		border-bottom: 0;
	}
	.company-info .company-name .data p{
		font-weight: 500 !important;
	}
	.company-info .company-name .data p a,.company-info .company-name p.bold{
		font-weight: 700 !important;
	}
	
	
	.invoice-number.second{
		 page-break-after: always;
	}
}

</style>
<div class="invoice-wrapper openSans">

	<div class="first-div">


		<!--company row-->
		<div class="company-info">
			<div class="row">

				<div class="col-xs-12">
					<div class="company-name text-center">
						<h2>Dienstleistungsvertrag</h2>
						<p>zwischen</p>
						<div class="data">
							<p>Firma</p>
							<p style="margin-bottom: 0">
								<span><a href="#" id="company_name" data-type="text">Company Name</a> & </span>
								<span><a href="#" class="editable" id="customer_name" data-type="text">Customer Name</a></span>
							</p>
							<p><a href="#" class="editable" id="customer_address" data-type="text">Customer Address</a></p>
							<p>nachfolgend „ Auftraggeber“ genannt</p>
							<p>und</p>
							<p>Firma</p>
							<p class="bold">Company Name</p>
							<p>nachfolgend „Auftragnehmer“ genannt,<br>
								wird nachfolgender Vertrag geschlossen
							</p>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!--company row-->

		<!--invoice number row-->
		<div class="invoice-number">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p class="title">§ 1</p>
					<h4>Vertragsgegenstand</h4>
					<div class="row text-left p-data">
						<p>Der Auftragnehmer verpflichtet sich gegenüber dem Auftraggeber, für diesen als, Dienstleister Programmiere nach Maßgabe dieses Vertrages zu erbringen. Vertragsbeginn ist der 11.07</p>
						<p>Der Auftragnehmer ist berechtigt, die nach diesem Vertrag obliegenden Leistungen durch Dritte erbringen zu lassen, wenn er dies dem Auftraggeber schriftlich anzeigt und dieser nicht innerhalb von 4 Wochen widerspricht.</p>
					</div>
				</div>
			</div>
		</div>
		<!--invoice number row-->
		
		<!--invoice number row-->
		<div class="invoice-number second">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p class="title">§ 2</p>
					<h4>Personal des Auftragnehmers</h4>
					<div class="row text-left p-data">
						<p>Der Auftragnehmer verpflichtet sich die im Rahmen dieses Vertrages eingesetzten Mitarbeiter auf ihre Zuverlässigkeit zu prüfen, polizeiliche Führungszeugnisse und sonstige Auskünfte einzuholen und alle ihm möglichen Vorkehrungen zu treffen, um Vermögensdelikte zu vermeiden.</p>
						<p>Der Auftraggeber ist berechtigt, jederzeit Kontrollen über die Zuverlässigkeit und Einhaltung der Qualitätsstandards des Auftragnehmers durchzuführen.</p>
					</div>
				</div>
			</div>
		</div>
		<!--invoice number row-->

		<!--invoice number row-->
		<div class="invoice-number">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p class="title">§ 3</p>
					<h4>Abrechnung und Vergütung</h4>
					<div class="row text-left p-data">
						<p>Der Auftragnehmer erhält für seine vertraglich erbrachten Leistungen und auf Grund des vorliegenden Angebots eine entsprechende Vergütung.</p>
						<p>Diese errechnet sich entweder aus der vereinbarten, monatlichen Pauschalsumme oder entsprechend den vorhandenen Tourenplänen. Es ist somit auch ein Produkt aus dem Stundensatz und der lt. Tourenplänen ermittelten Stundenzahl möglich.</p>
						<p>Der Auftragnehmer erhält zusätzlich den derzeit gültigen gesetzlichen Umsatzsteuerbetrag.</p>
						<p>Die Details werden im Vertragsanhang erfasst.</p>
						<p>Der Rechnungsbetrag ist fällig 30 Tage nach Eingang der Rechnung.</p>
					</div>
				</div>
			</div>
		</div>
		<!--invoice number row-->

		<!--invoice number row-->
		<div class="invoice-number">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p class="title">§ 4</p>
					<h4>Schadenersatz</h4>
					<div class="row text-left p-data">
						<p>Der Auftragnehmer ist zur Zahlung eines Schadenersatzes verpflichtet, wenn er finanziellen Schaden für den Auftraggeber herbeiführt und dann im vollen Umfang des Schadens.</p>
					</div>
				</div>
			</div>
		</div>
		<!--invoice number row-->

		<!--invoice number row-->
		<div class="invoice-number">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p class="title">§ 5</p>
					<h4>Gewährleistung, Haftung, Versicherung</h4>
					<div class="row text-left p-data">
						<p>Soweit die pünktliche Erfüllung des Vertrages wegen Ausfalls von oder Personal sowie beauftragter Unternehmen seitens des Auftragnehmers oder aus sonstigen vom Auftragnehmer zu vertretenden Gründen ganz oder teilweise gefährdet ist, kann der Auftraggeber ohne vorherige Mahnung Dritte mit der Erfüllung des Vertrages beauftragen. Der daraus resultierende materielle Schaden ist vom Auftragnehmer zu begleichen.</p>
						<p>Der Auftragnehmer haftet im Übrigen für die von ihm verursachten Schäden an den ihm übergebenen Sendungen gemäß AGNB.</p>
						<p>Der Auftragnehmer ist verpflichtet, für seine im Rahmen dieses Vertrages übernommenen Verpflichtungen ausreichenden Versicherungsschutz vorzuweisen.</p>
					</div>
				</div>
			</div>
		</div>
		<!--invoice number row-->

		<!--invoice number row-->
		<div class="invoice-number">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p class="title">§ 6</p>
					<h4>Vertragsdauer, Kündigung</h4>
					<div class="row text-left p-data">
						<p>Der Vertrag wird auf unbestimmte Zeit geschlossen.</p>
						<p>Beide Vertragsparteien sind berechtigt, den Vertrag mit einer Frist von 4 Wochen zum Monatsende zu beenden.</p>
						<p>Das Recht zur fristlosen Kündigung des Vertrages aus wichtigem Grund bleibt unberührt.</p>
						<p>Jede Kündigung hat schriftlich zu erfolgen.</p>
					</div>
				</div>
			</div>
		</div>
		<!--invoice number row-->

		<!--invoice number row-->
		<div class="invoice-number">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p class="title">§ 7</p>
					<h4>Vertraulichkeit, Geheimhaltungsschutz</h4>
					<div class="row text-left p-data">
						<p>Der Auftragnehmer verpflichtet sich, die während der Dauer der Zusammenarbeit bekannt gewordenen Betriebs- oder Geschäftsgeheimnisse vertraulich zu behandeln und insbesondere Dritten nicht zur Kenntnis zu bringen. Ihm zur Verfügung gestellte Daten unterliegen dem Datenschutz. Diese Verpflichtung gilt auch nach Beendigung des Vertrages.</p>
						<p>Der Auftragnehmer trägt dafür aktenkundig Sorge, dass die von Ihm Beauftragten bezüglich des Umgangs mit Betriebs- und Geschäftsgeheimnissen unterwiesen werden.</p>
						<p>Während und für die Dauer von einem Jahr nach Beendigung dieses Vertrages verpflichten sich die Vertragsparteien gegenseitig, für die Kunden des jeweils anderen Vertragspartners keine Dienstleistungen zu erbringen oder zu vermitteln, und zwar gleichgültig, ob dies direkt oder indirekt, unmittelbar oder mittelbar, in eigenem oder in fremden Namen, für eigene oder fremde Rechnung oder als selbständiger Unternehmer bzw. im Rahmen eines Anstellungsverhältnisses geschieht.</p>
						<p>Als geschützte Kunden gelten alle während der Laufzeit dieses Vertrages im Rahmen der Einzelaufträge an den Dienstleister vermittelte Auftragskunden. Davon ausgenommen sind Kunden, die vor Abschluss dieses Vertrages bereits Kunden des Auftragnehmers waren.</p>
						<p>Für den Fall der Zuwiderhandlung schuldet der Verletzer eine selbständige Vertragsstrafe in angemessener Höhe unter Berücksichtigung des bisherigen und vermuteten zukünftigen Kundenumsatzes.</p>
					</div>
				</div>
			</div>
		</div>
		<!--invoice number row-->

		<!--invoice number row-->
		<div class="invoice-number">
			<div class="row">
				<div class="col-xs-12 text-center">
					<p class="title">§ 8</p>
					<h4>Sonstiges</h4>
					<div class="row text-left p-data">
						<p>Der Auftragnehmer versichert mit seiner Unterschrift, dass er über den notwendigen Versicherungsschutz gemäß AGNB sowie eine Betriebshaftpflichtversicherung verfügt.</p>
						<p>Des Weiteren versichert er dem Auftraggeber, dass die Sozialabgaben und Lohnsteuern der Beschäftigten ordnungsgemäß berechnet sowie fristgerecht und vollumfänglich entrichtet werden.</p>
						<p>Sollten eine oder mehrere Bestimmungen dieses Vertrages nicht durchführbar oder unwirksam sein, so bleibt die Wirksamkeit der übrigen Bestimmungen unberührt.</p>
						<p>Dieser Vertrag ist nur in Schriftform gültig, Änderungen dieses Vertrages bedürfen ebenfalls Schriftform.</p>
						<p>Gerichtsstand zur Durchsetzung dieses Vertrages ist Berlin.</p>
					</div>
				</div>
			</div>
		</div>
		<!--invoice number row-->

		<!--invoice number row-->
		<div class="invoice-number last">
			<div class="row">
				<div class="col-xs-12">
					<h6><span>Datum: </span><a href="#" class="editable" id="date" data-type="date"></a></h6>
					<div class="col-xs-6 sign">
						<div class="border">
							<span>AUFTRAGNEHMER</span>
						</div>
					</div>
					<div class="col-xs-6 sign">
						<div class="border">
							<span>AUFTRAGGEBER</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--invoice number row-->
		
	</div>

	


</div>

	@endsection

	@section('scripts2')
	<script type="text/javascript">
		$(function(){

			$(".print").on('click',function(){
				window.print();
			});
			
			$('a#company_name').editable({
				mode:'inline',
				success: function(response , newValue){
					$('p.bold').empty().html(newValue);
				},
			});
			


			$(document).on('click', '#download', function (e) {
				
				e.preventDefault();
				e.stopPropagation();
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url: "{{route('documents.download_service_contract')}}",
					type: 'POST',
					data: {
						'_token': $('input[name="_token"]').val(),
						'company_name': $('a#company_name').html(),
						'customer_name': $('a#customer_name').html(),
						'customer_address': $('a#customer_address').html(),
						'date': $('a#date').html(),
					},
					
				});

			});

		});
	</script>
	@endsection