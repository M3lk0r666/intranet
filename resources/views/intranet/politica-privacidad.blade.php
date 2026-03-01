@extends('layouts.intranet')

@section('title', 'Intranet Corporativa')

@push('css')
    <link href="/assets/css/intrahome.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries" />
@endpush

@section('content')

    <div class="bg-white rounded-lg shadow p-6 mb-8">

        <!-- Encabezado -->
        <div class="text-center mb-16 mt-4">
            <h1 class="text-4xl font-black font-display tracking-tight text-slate-900 uppercase">
                Aviso de Privacidad<span class="text-primary  uppercase"> (Intranet)</span>
            </h1>
        </div>

        <!--politica de privacidad-->
        <div class="flex-1 flex items-center">
            <!-- Content Area -->
            <div class="flex-1 ">
                <div class="prose prose-slate dark:prose-invert max-w-none">
                    <section class="mb-12">
                        <p class="text-lg leading-relaxed text-slate-700 text-justify">
                            En atención a la Ley Federal de Protección de Datos Personales en posesión de los Particulares
                            vigente en México
                            (“la Ley”), le informamos que este Aviso de Privacidad de Datos Personales (“Aviso”) describe
                            cómo Netjer
                            Networks México con domicilio fiscal en: Cjon. Tordo 22, Tacubaya, Miguel Hidalgo, 11870 Ciudad
                            de México,
                            (“NETJER NETWORKS”), podrían recolectar y usar información proporcionada por Usted a través de
                            diversos medios o
                            en su caso a través del sitio de Internet de la empresa:
                            <a href="https://netjernetworks.com/" target="_blank"
                                class="text-orange-500">www.netjernetworks.com</a> (“Portal”), con el objeto de
                            facilitar la prestación de servicios, comercialización y demás situaciones que se describen en
                            el cuerpo del presente aviso.
                        </p>
                    </section>
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900  mb-6 flex items-center gap-3">
                            <span
                                class="bg-primary/10 text-primary size-8 rounded flex items-center justify-center text-sm">01</span>
                            ¿Para qué fines utilizaremos sus datos personales?
                        </h2>
                        <p class="mb-4 text-slate-700 text-justify">Los datos personales que recabamos sobre Usted son
                            necesarios para
                            verificar y confirmar su identidad;
                            administrar y operar los servicios que se le presten y comercializar los productos que solicita
                            o contrata con
                            nosotros, o que nosotros contratamos o solicitamos a Usted y para cumplir con las obligaciones
                            derivadas de
                            dicha comercialización y prestación de servicios, finalidades que son necesarias para la
                            prestación del servicio
                            solicitado.
                        </p>
                        <p class="mb-4 text-slate-700 text-justify">En el caso de clientes y/o proveedores no se da
                            tratamiento a datos
                            personales sensibles. De manera adicional,
                            utilizaremos su información personal para informarle sobre nuevas propuestas de servicios,
                            productos y/o
                            promociones.
                        </p>
                        <p class="mb-4 text-slate-700 text-justify">Los datos que nos proporcione también podrán ser
                            utilizados, solo en
                            caso de ser necesario para notificar de
                            algún procedimiento extrajudicial o judicial a la empresa que represente, de ser Usted
                            representante o apoderado
                            legal de alguno de nuestros clientes y/o proveedores.
                        </p>
                        <p class="mb-4 text-slate-700 text-justify">Si bien estas finalidades no son necesarias para
                            prestarle los
                            servicios y productos que solicita o contrata con
                            nosotros, las mismas nos permiten brindarle un mejor servicio y elevar su calidad.
                        </p>
                        <p class="mb-4 text-slate-700 text-justify">En caso de que no desee que sus datos personales sean
                            tratados para
                            estos fines adicionales, tiene derecho a
                            manifestarlo, para lo cual le puede ser proporcionado el formato correspondiente, acudiendo al
                            domicilio de la
                            empresa o accediendo al “Portal” y llenar el referido formato.
                        </p>
                        <p class="mb-4 text-slate-700 text-justify">La negativa para el uso de sus datos personales para
                            estas
                            finalidades secundarias no será motivo para que le
                            neguemos los servicios y productos que solicita o contrata con nosotros. En caso de que no
                            manifieste su
                            negativa, se entenderá que autoriza el uso de su información personal para dichos fines.
                        </p>
                        <p class="mb-4 text-slate-700 text-justify">NETJER NETWORKS a efecto de brindar seguridad al
                            personal que
                            ingresa a sus instalaciones, video graba y
                            monitorea las mismas, las 24 horas del día, los 365 días del año.
                        </p>
                        <p class="mb-4 text-slate-700 text-justify">Toda persona que ingrese a las instalaciones de Netjer
                            Networks,
                            podrá ser videograbada por nuestras cámaras de
                            seguridad, asimismo podría ser fotografiada.
                        </p>
                        <p class="mb-4 text-slate-700 text-justify">Las imágenes captadas por las cámaras del sistema de
                            circuito
                            cerrado de televisión serán utilizadas para su
                            seguridad y de las personas que nos visitan, con el propósito de monitorear vía remota los
                            inmuebles y,
                            confirmar en tiempo real cualquier condición de riesgo para minimizarla. Asimismo, con el fin de
                            resguardar los
                            recursos materiales y humanos dentro de nuestras instalaciones. Las fotografías son destinadas a
                            llevar a cabo
                            el control de acceso a nuestras instalaciones corporativas.
                        </p>

                    </section>
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900  mb-6 flex items-center gap-3">
                            <span
                                class="bg-primary/10 text-primary size-8 rounded flex items-center justify-center text-sm">02</span>
                            ¿Qué datos personales recabamos y utilizamos sobre usted?
                        </h2>
                        <p class="mb-4 text-slate-700 ">Para llevar a cabo las finalidades descritas en el presente aviso de
                            privacidad, utilizaremos los siguientes datos personales, conforme a lo siguiente:</p>
                        <div class="bg-primary/10 border-l-4 border-primary p-6 rounded-r-xl">
                            <div class="flex gap-4">
                                <div>
                                    <p class="text-slate-900 font-bold uppercase">CLIENTES Y PROVEEDORES COMERCIALES.</p>
                                    <p class="text-slate-600  text-sm mt-1">Nombre completo, domicilio, número celular,
                                        número telefónico de la empresa en la que labora, correo electrónico personal y/o de
                                        la empresa en la que labora, en general datos laborales, firma autógrafa, cargo o
                                        puesto, registro federal de contribuyentes, así como referencias personales,
                                        crediticias, comerciales, datos financieros y/o patrimoniales.</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                            <span
                                class="bg-primary/10 text-primary size-8 rounded flex items-center justify-center text-sm">03</span>
                            ¿Con quién compartimos sus datos personales y en su caso sensibles?
                        </h2>
                        <p class="text-slate-700  leading-relaxed text-justify">
                            De forma eventual, sus datos personales pueden ser compartidos con socios comerciales,
                            proveedores de servicios, y/o las empresas pertenecientes a NETJER NETWORKS con el objetivo de
                            prestarle un mejor servicio y/o cuando exista una necesidad relacionada con los fines
                            contractuales, en el entendido de que las empresas pertenecientes a NETJER NETWORKS podrán
                            contactarlo directamente.</p>
                        <p class="text-slate-700  leading-relaxed text-justify">
                            Asimismo, Netjer Networks México podrá comunicar sus datos personales y/o sensibles atendiendo
                            requerimientos de
                            información de las autoridades competentes.</p>
                        <p class="text-slate-700  leading-relaxed text-justify">
                            Los datos podrán ser transferidos a sociedades filiales y/o controladoras y en su caso a
                            terceros relacionados
                            estrictamente con la prestación de servicios que se contrate, quienes deberán por su cuenta
                            atender las
                            disposiciones legales de privacidad. Toda información será sujeta a confidencialidad.</p>
                        <p class="text-slate-700  leading-relaxed text-justify">
                            En cualquier caso, comunicaremos el presente aviso de privacidad a los destinatarios de sus
                            datos personales, a
                            fin de que respeten sus términos.</p>
                        <p class="text-slate-700  leading-relaxed text-justify">
                            En caso de que no desee que sus datos personales sean tratados para estos fines adicionales,
                            tiene derecho a
                            manifestarlo, para lo cual le puede ser proporcionado el formato correspondiente denominado
                            “Solicitud para el
                            Ejercicio de Derechos ARCO”, acudiendo al domicilio de la empresa o accediendo al mismo a través
                            del “Portal”.</p>
                        <p class="text-slate-700  leading-relaxed text-justify">
                            Si usted no manifiesta su negativa para dichas transferencias, entenderemos que nos ha otorgado
                            su
                            consentimiento para las mismas.</p>
                    </section>
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900  mb-6 flex items-center gap-3">
                            <span
                                class="bg-primary/10 text-primary size-8 rounded flex items-center justify-center text-sm">04</span>
                            ¿Cómo puede acceder, rectificar o cancelar sus datos personales, u oponerse a su uso (DERECHOS
                            ARCO)?
                        </h2>
                        <p class="mb-4 text-slate-700 text-justify">Usted tiene derecho a conocer qué datos personales
                            tenemos de Usted, para qué los utilizamos y las condiciones
                            del uso que les damos (Acceso). Asimismo, es su derecho solicitar la corrección de su
                            información personal en
                            caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de
                            nuestros
                            registros o bases de datos cuando considere que la misma no está siendo utilizada conforme a los
                            principios,
                            deberes y obligaciones previstas en la normativa (Cancelación); así como oponerse al uso de sus
                            datos personales
                            para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.</p>
                        <p class="mb-4 text-slate-700 text-justify">Usted podrá acceder, rectificar o cancelar sus datos
                            personales, o bien oponerse o revocar su consentimiento
                            para el uso de los mismos, presentando su solicitud. Para tener acceso a la solicitud y conocer
                            el procedimiento
                            y requisitos para el ejercido de los derechos ARCO, Usted podrá llamar al siguiente número
                            telefónico 55 1054
                            1184; ingresar a nuestro sitio de Internet
                            <a href="https://netjernetworks.com/" target="_blank"
                                class="text-orange-500">www.netjernetworks.com</a>
                            a la sección “Aviso de
                            Privacidad”, o bien ponerse en contacto asistir a nuestras
                            oficinas ubicadas en: Cjon. Tordo 22, Tacubaya, Miguel Hidalgo, 11870 Ciudad de México, CDMX,
                            teléfono 55 1054 1184, o al correo electrónico
                            <a class="inline-flex items-center px-3 py-1 text-primary text-base font-bold mb-4"
                                href="mailto:avisodeprivacidad@netjernetworks.com.mx">
                                avisodeprivacidad@netjernetworks.com.mx
                            </a>.
                        </p>
                        <p class="mb-4 text-slate-700 text-justify">En donde se dará trámite a las solicitudes para el
                            ejercicio de estos derechos, y atenderá cualquier duda que
                            pudiera tener respecto al tratamiento de su información.</p>
                    </section>
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                            <span
                                class="bg-primary/10 text-primary size-8 rounded flex items-center justify-center text-sm">05</span>
                            ¿Cómo puede revocar su consentimiento para uso de sus datos personales?
                        </h2>
                        <p class="text-slate-700 mb-6 text-justify">Usted puede revocar el consentimiento que, en su
                            caso, nos haya otorgado para el tratamiento de sus datos
                            personales. Sin embargo, es importante que tenga en cuenta que no en todos los casos podremos
                            atender su
                            solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación
                            legal requiramos
                            seguir tratando sus datos personales. Asimismo, usted deberá considerar que para ciertos fines,
                            la revocación de
                            su consentimiento implicará que no le podamos seguir prestando el servicio que nos solicitó, o
                            la conclusión de
                            su relación con nosotros.</p>
                        <p class="text-slate-700 mb-6 text-justify">Para revocar su consentimiento deberá presentar su
                            solicitud. Para tener acceso a la solicitud, conocer los
                            requisitos para la revocación del consentimiento, usted podrá llamar al siguiente número
                            telefónico 55 1054
                            1184; ingresar a nuestro sitio de Internet
                            <a href="https://netjernetworks.com/" target="_blank"
                                class="text-orange-500">www.netjernetworks.com</a> en la sección “Aviso de
                            Privacidad”.
                        </p>
                    </section>
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                            <span
                                class="bg-primary/10 text-primary size-8 rounded flex items-center justify-center text-sm">06</span>
                            Medidas para salvaguardar la Confidencialidad e Integridad de los Datos Personales.
                        </h2>
                        <p class="text-slate-700 mb-6 text-justify">NETJER NETWORKS está comprometido con la salvaguarda
                            e integridad de los Datos Personales obtenidos por
                            cualquier medio y de la información propiedad de nuestros clientes, empleados y socios
                            comerciales, por lo que
                            contamos con medidas para la protección de Datos, de conformidad con los requerimientos que
                            exige la
                            legislación. Por lo anterior, los Datos Personales y los Datos Personales sensibles que nos
                            proporcionen
                            voluntariamente ya sea en formato físico, electrónico o por cualquier otro medio, son tratados
                            de manera
                            confidencial a través de medidas físicas, tecnológicas y administrativas.</p>
                        <p class="text-slate-700 mb-6 text-justify">Los clientes y socios comerciales deberán
                            proporcionar Datos Personales precisos, claros, completos y
                            actualizados, al momento en que se lleve a cabo su recopilación, y en todo momento, sin
                            perjuicio de que puedan
                            ejercer sus derechos sobre los mismos.</p>
                        <p class="text-slate-700 mb-6 text-justify">La información personal provista por nuestros
                            clientes, proveedores y socios comerciales, solamente será
                            utilizada para fines operativos, comerciales y para el uso de productos y servicios, y será la
                            mínima necesaria
                            para la existencia, mantenimiento y cumplimiento de la relación jurídica entre NETJER NETWORKS y
                            el Titular.</p>
                    </section>
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                            <span
                                class="bg-primary/10 text-primary size-8 rounded flex items-center justify-center text-sm">07</span>
                            Aceptación del Aviso de Privacidad.
                        </h2>
                        <p class="text-slate-700 mb-6 text-justify">La firma de aceptación de cualquier
                            documento
                            emitido por NETJER NETWORKS en donde se haga referencia a este
                            Aviso de Privacidad implica la aceptación expresa para que sus Datos Personales sean tratados
                            como se señala en
                            el presente Aviso.</p>
                        <p class="text-slate-700 mb-6 text-justify">De no estar de acuerdo con el uso y
                            tratamiento de
                            sus Datos Personales de conformidad con el presente Aviso de
                            Privacidad, no será posible brindarle los servicios de NETJER NETWORKS o establecer relación
                            jurídica alguna.</p>
                    </section>
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                            <span
                                class="bg-primary/10 text-primary size-8 rounded flex items-center justify-center text-sm">08</span>
                            Sitios web que no corresponden a Netjer Networks
                        </h2>
                        <p class="text-slate-700 mb-6 text-justify">Nuestro Sitio web, puede contener links
                            o enlaces a
                            sitios web externos que no corresponden a NETJER NETWORKS y
                            por tanto, no guardan relación alguna con nosotros. Le recomendamos revisar y leer las políticas
                            de privacidad,
                            así como los términos de uso de dichos sitios web externos antes de hacer uso de los mismos.</p>
                    </section>
                    <section class="mb-12">
                        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                            <span
                                class="bg-primary/10 text-primary size-8 rounded flex items-center justify-center text-sm">09</span>
                            ¿Cómo puede conocer los cambios a este aviso de privacidad?
                        </h2>
                        <p class="text-slate-700 mb-6 text-justify">El presente aviso de privacidad puede
                            sufrir
                            modificaciones, cambios o actualizaciones derivadas de nuevos
                            requerimientos legales; de nuestras propias necesidades por los productos o servicios que
                            ofrecemos; de nuestras
                            prácticas de privacidad; de cambios en nuestro modelo de negocio, o por otras causas.</p>
                        <p class="text-slate-700 mb-6 text-justify">En tal caso, nos comprometemos a
                            mantenerlo
                            informado sobre los cambios que pueda sufrir el presente aviso de
                            privacidad, a través del “Portal”, en donde se indicará la fecha de última versión del aviso,
                            por lo que le
                            recomendamos visitar periódicamente dicha página con la finalidad de informarse si ocurre algún
                            cambio.</p>
                        <p class="text-slate-700 mb-6 text-justify">Si usted considera que su derecho a la
                            protección de
                            sus datos personales ha sido lesionado por alguna conducta
                            u omisión de nuestra parte, o presume alguna violación a las disposiciones previstas en la Ley
                            Federal de
                            Protección de Datos Personales en Posesión de los Particulares, su Reglamento y demás
                            ordenamientos aplicables,
                            podrá interponer su inconformidad o denuncia ante el Instituto Nacional de Transparencia, Acceso
                            a la
                            Información y Protección de Datos Personales (INAI). Para mayor información, le sugerimos
                            visitar su página
                            oficial de Internet
                            <a href="www.ifai.gob.mx" target="_blank" class="text-orange-500">www.ifai.gob.mx</a>
                        </p>
                    </section>
                </div>
                <div class="pt-10 border-t border-slate-200 flex flex-col sm:flex-row justify-center items-center gap-6">
                    <div class="flex gap-4">
                        <a href="{{ route('intranet.index') }}"
                            class="px-6 py-2.5 rounded-lg bg-primary text-white text-sm font-bold shadow-lg shadow-primary/20">
                            ir a Home
                        </a>
                    </div>
                </div>
            </div>


        </div>



    </div>


@endsection
