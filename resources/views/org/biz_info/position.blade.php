@extends('org.layouts.layout')

@section('title', $title)
@section('content')

    <section class="news1 m-auto">
        <div class="news-main1 m-auto"><a href="{{ route('home') }}" class="to_main_page">@lang('main.main')</a>
            <h1>@lang('main.position')</h1>
        </div>
    </section>
    <section class="blocks " style="background: none!important;">

        <div class="container">
            <div class="row">
                @if(app()->getLocale() === 'ru' || app()->getLocale() === null)
                    <div class="col-lg-12 tpp" style="padding: 40px">
                        <p>
                        </p>
                        <p style="text-align:center;"><strong>Положение</strong></p>
                        <p style="text-align:center;">на проведение конкурса на разработку Национального бренда
                            (логотипа)
                            «Сделано в Туркменистане»</p>
                        <p style="text-align:justify;"><strong>1. Общие положения</strong></p>
                        <p style="text-align:justify;">Настоящее Положение определяет условия и порядок проведения
                            конкурса
                            на разработку Национального бренда «Сделано в Туркменистане» (далее – Конкурс).</p>
                        <p style="text-align:justify;">Организатор Конкурса Торгово-промышленная палата Туркменистана.
                            &nbsp;</p>
                        <p style="text-align:justify;"><strong>2.Цель и задачи Конкурса</strong></p>
                        <p style="text-align:justify;">2.1.Цель Конкурса –разработка и определение лучшего предложения
                            по
                            формированию Национального бренда «Сделано в Туркменистане» .</p>
                        <p style="text-align:justify;">В своей работе участники Конкурса должны учитывать, что
                            национальный
                            бренд призван позиционировать Туркменистан как страну с богатой историей и культурой,
                            сохранившей свою самобытность и имеющей высокий уровень стабильности и согласия.&nbsp;</p>
                        <p style="text-align:justify;"><strong>2.2. Основные задачи Конкурса:</strong></p>
                        <p style="text-align:justify;">1) повышение имиджевой привлекательности и узнаваемости
                            Туркменистана
                            на международных рынках;</p>
                        <p style="text-align:justify;">2)&nbsp; содействие информационному продвижению уникальной
                            туркменской продукции, туристических объектов, привлечение иностранных инвестиций.</p>
                        <p style="text-align:justify;">3) повышение репутации производителя товаров и услуг,&nbsp;</p>
                        <p style="text-align:justify;">4) подтверждение их качества и надежности, которые потребитель
                            связывает с торговой маркой данного продукта или с его производителем</p>
                        <p style="text-align:justify;"><strong>3.Рабочие органы Конкурса</strong></p>
                        <p style="text-align:justify;">Для решения организационных и технических вопросов Конкурса
                            создается
                            Организационный комитет Конкурса (далее – Организационный комитет). &nbsp;Экспертный совет
                            создается для определения победителя конкурса.</p>
                        <p style="text-align:justify;">3.1. Организационный комитет (оргкомитет) формируется из
                            представителей Торгово-промышленной палаты Туркменистана. &nbsp;Оргкомитет осуществляет
                            координацию работы и документооборот Конкурса, выполняет коммуникационные функции и
                            осуществляет
                            практическое руководство и координацию деятельности по подготовке и проведению всех
                            мероприятий,
                            сопутствующих Конкурсу.</p>
                        <p style="text-align:justify;">К исключительной компетенции Оргкомитета относятся:</p>
                        <p style="text-align:justify;">1) решение технических, организационных, финансовых и иных
                            вопросов в
                            рамках Конкурса;</p>
                        <p style="text-align:justify;">2) прием заявок для участия в конкурсе.</p>
                        <p style="text-align:justify;">3) обработка предложений, зарегистрированных на сайте
                            Торгово-промышленной палаты Туркменистана;</p>
                        <p style="text-align:justify;">4) Организация работы Экспертного совета;</p>
                        <p style="text-align:justify;">6) формирование информационной базы и архива Конкурса;</p>
                        <p style="text-align:justify;">3.2. Экспертный совет формируется из представителей министерства
                            финансов и экономики, Министерства культуры, Государственной академии художеств,
                            Торгово-промышленной палаты Туркменистана в целях обеспечения объективного отбора конкурсных
                            работ, их последующей оценки и определения победители.&nbsp;</p>
                        <p style="text-align:justify;">К исключительной компетенции Экспертного совета относятся:</p>
                        <p style="text-align:justify;">1.Отбор конкурсных работ.</p>
                        <p style="text-align:justify;">2.Оценка представленных на конкурс работ в соответствии с
                            разработанными критериями.&nbsp;</p>
                        <p style="text-align:justify;">3.Определение победителя и его награждение.&nbsp; &nbsp;</p>
                        <p style="text-align:justify;"><strong>4. Требования к конкурсным работам</strong></p>
                        <p style="text-align:justify;">4.1.В конкурсе могут принять участие дизайнерские компании, IT
                            компании, худоржники, дизайнеры, студенты хужественного училища и художественной академии,
                            предприниматели без образования юридического лица и другие юридические физические лица.</p>
                        <p style="text-align:justify;">4.2.Для участия в конкурсе по разработке Национального бренда
                            «Сделано в Туркменистане» участникам необходимо предоставить:</p>
                        <p style="text-align:justify;">1) Логотип – графический знак (эмблема/символ), который будет
                            использоваться для повышения узнаваемости Туркменистана на международных рынках. Он должен
                            содержать название бренда, которое он идентифицирует, в виде стилизованных букв и/или слова.
                            Логотип должен быть представлен в форматах jpeg, png, giff, размер 1000x1000 px.</p>
                        <p style="text-align:justify;">2) Слоган – «Сделано в Туркменистане» который в сжатом виде
                            передаёт
                            сообщение, употребляемое во всех видах рекламной коммуникации для привлечения внимания
                            целевой
                            аудитории. Предлагаемый слоган должен легко читаться, быть оригинальным, вызывать интерес и
                            представлен на государственном, русском и английском языках.</p>
                        <p style="text-align:justify;">3) Концепция Национального бренда может быть разработана и
                            представлена в произвольной форме на государственном языке. Приветствуется подача концепции
                            в
                            формате альбома, включающего примеры нанесения бренда на различную продукцию (ручки,
                            брелоки,
                            значки, футболки, бейсболки и пр.), а также макеты рекламных щитов, рекламных модулей в
                            печатных
                            и электроных СМИ, баннеров для веб-сайтов, брошюр, листовок и другой продукции. Также в
                            концепции необходимо описать центральную идею работы, дать разъяснения по основным посылам
                            логотипов.</p>
                        <p style="text-align:justify;"><strong>5. Порядок определения победителя Конкурса</strong></p>
                        <p style="text-align:justify;">5.1.Работы претендентов будут презентованы авторами перед
                            Экспертным
                            Советом.</p>
                        <p style="text-align:justify;">5.2.Экспертный совет рассматривает и дает оценку работам. Среди
                            участников конкурса будет определена лучшая работа по нижеследующим критериям:</p>
                        <p style="text-align:justify;">1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Оригинальность и новизна идеи&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;</p>
                        <p style="text-align:justify;">2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Легкость восприятия и
                            запоминаемость&nbsp;
                            &nbsp;</p>
                        <p style="text-align:justify;">3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Отражение страновых особенностей
                            (культура, традиции, индустрия, туризм, ценности)&nbsp;&nbsp; &nbsp;</p>
                        <p style="text-align:justify;">4)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Целостность художественного
                            образа&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp; &nbsp;</p>
                        <p style="text-align:justify;">5)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Качество и эстетика выполненной
                            работы&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p>
                        <p style="text-align:justify;">6)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Применение нестандартных техник
                            исполнения и художественных материалов&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</p>
                        <p style="text-align:justify;">7)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Долговечность стиля&nbsp;&nbsp;&nbsp;
                            &nbsp;</p>
                        <p style="text-align:justify;">8)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Привлекательность&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;</p>
                        <p style="text-align:justify;">9)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Отражение стремления страны к
                            развитию и внедрению инноваций&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p>
                        <p style="text-align:justify;">10)&nbsp;&nbsp;&nbsp; Ориентация как на внутреннюю, так и на
                            международную аудиторию&nbsp;&nbsp;</p>
                        <p style="text-align:justify;">11)&nbsp;&nbsp;&nbsp; Функциональность&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;</p>
                        <p style="text-align:justify;">5.3. По итогам оценки работ Экспертный Совет выявляет победителя
                            (-ей) конкурса.&nbsp;</p>
                        <p style="text-align:justify;">Победитель конкурса поощряется Дипломом и ценным подарком.</p>
                        <p style="text-align:justify;"><strong>&nbsp;6.Авторские права</strong></p>
                        <p style="text-align:justify;">Ответственность за соблюдение авторских прав работы, участвующей
                            в
                            конкурсе, несет автор.</p>
                        <p style="text-align:justify;">Участвуя в конкурсе, автор автоматические передает право
                            организаторам конкурса на использование представленного материала.</p>
                        <p style="text-align:justify;">Присланные на конкурс логотипы не возвращаются</p>
                        <p></p>
                    </div>
                @elseif(app()->getLocale() === 'tk' || app()->getLocale() === null)
                    <div class="col-lg-12 tpp" style="padding: 40px">
                        <p>
                        </p><p style="text-align:center;">&nbsp;“Türkmenistanda öndürilen” milli nyşany&nbsp; döretmek boýunça bäsleşigi geçirmegiň&nbsp;<br><strong>Tertibi</strong></p><p style="text-align:justify;"><strong>1. Umumy düzgünler</strong></p><p style="text-align:justify;">Şu Tertip “Türkmenistanda öndürilen” milli nyşany döretmek boýunça bäsleşigi (mundan beýläk - Bäsleşik) geçirmegiň şertlerini we tertibini kesgitleýär.</p><p style="text-align:justify;">Bäsleşigi guraýjy - Türkmenistanyň Söwda-senagat edarasy.&nbsp;</p><p style="text-align:justify;"><strong>2. Bäsleşigiň maksady we wezipeleri</strong></p><p style="text-align:justify;">2.1. Bäsleşigiň maksady –“Türkmenistanda öndürilen” Milli nyşanyň şekili boýunça tekliplere seretmek we iň gowy şekili saýlap almak.</p><p style="text-align:justify;">Bäsleşige gatnaşyjylar öz işinde Türkmenistan Watanymyzy baý taryhy we medeniýeti bolan, dünýä bileleşiginde harytlary we hyzmatlary öndürmekde ägirt uly mümkinçiliklere eýe bolan döwlet hökmünde görkezmeli.&nbsp;</p><p style="text-align:justify;">&nbsp;</p><p style="text-align:justify;"><strong>2.2. Bäsleşigiň esasy wezipeleri:</strong></p><p style="text-align:justify;">1) Ýokary hilli harytlary üpjün edýän ýurt hökmünde dünýä bazarynda Türkmenistanyň abraýyny ýokarlandyrmak;</p><p style="text-align:justify;">2) ýurdumyzyň eksport mümkinçiliklerini giňeltmäge we maýa goýumlary çekmäge oňyn täsir etmek;</p><p style="text-align:justify;">3) Türkmenistanda öndürilýän önümleriň, syýahatçylyk obýektleriniň maglumat taýdan öňe sürülmegine ýardam bermek, daşary ýurt maýa goýumlaryny çekmek.</p><p style="text-align:justify;">4) ýurdumyzyň harytlary we hyzmatlary öndürijileriniň abraýyny ýokarlandyrmak, olaryň hilini we ygtybarlylygyny tassyklamak.</p><p style="text-align:justify;"><strong>3. Bäsleşigiň iş guramalary</strong></p><p style="text-align:justify;">Bäsleşigiň guramaçylyk we tehniki meselelerini çözmek üçin Bäsleşigiň Guramaçylyk komiteti (mundan beýläk - Guramaçylyk komiteti) döredilýär. Bäsleşigiň ýeňijisini kesgitlemek üçin Bilermenler geňeşi döredilýär.</p><p style="text-align:justify;">3.1. Guramaçylyk komiteti Türkmenistanyň Söwda-senagat edarasynyň wekilleriniň hataryndan düzülýär. Guramaçylyk komiteti Bäsleşigiň işini we resminama dolanyşygyny utgaşdyrýar, aragatnaşyk hyzmatlaryny ýerine ýetirýär hem-de iş ýüzünde ýolbaşçylygy amala aşyrýar. Bäsleşige ugurdaş bolan ähli çäreleri taýýarlamak we geçirmek babatyndaky işi utgaşdyrýar.</p><p style="text-align:justify;">Guramaçylyk komitetiniň aýratyn ygtyýarlyklaryna aşakdakylar degişli:</p><p style="text-align:justify;">1) Bäsleşigiň çäklerinde tehniki, guramaçylyk, maliýe we gaýry meseleleri çözmek;</p><p style="text-align:justify;">2) bäsleşige gatnaşmak üçin arzalary kabul etmek.</p><p style="text-align:justify;">3) Türkmenistanyň Söwda-senagat edarasynyň web-saýtynda bellige alnan teklipleriň üstünde işlemek;</p><p style="text-align:justify;">4) Bilermenler geňeşiniň işini guramak;</p><p style="text-align:justify;">6) Bäsleşigiň maglumat binýadyny we arhiwini kemala getirmek;</p><p style="text-align:justify;">3.2. Bilermenler geňeşi, bäsleşik işleriniň adalatly seçimini amala aşyrmak, gatnaşyjylaryň hödürlän işlerine baha bermek we ýeňijileri kesgitlemek maksady bilen, Türkmenistanyň Maliýe we ykdysadyýet ministrliginiň, Medeniýet ministrliginiň, Döwlet çeperçilik akademiýasynyň, Türkmenistanyň Söwda-senagat edarasynyň wekillerinden düzülýär.&nbsp;</p><p style="text-align:justify;">Bilermenler geňeşiniň aýratyn ygtyýarlyklaryna aşakdakylar degişlidir:</p><p style="text-align:justify;">1. Bäsleşige hödürlenen işlere seretmek.</p><p style="text-align:justify;">2. Bäsleşige hödürlenen işlere işlenip taýýarlanan ölçütlere, şertlere we talaplara laýyklykda baha bermek.&nbsp;</p><p style="text-align:justify;">3. Ýeňijini kesgitlemek we ony sylaglamak.&nbsp;</p><p style="text-align:justify;"><strong>4. Bäsleşik işlerine bildirilýän talaplar</strong></p><p style="text-align:justify;">4.1. Bäsleşige&nbsp;ýurdumyzyň şu ugurlarda iş alyp barýan ýuridiki we şahsy taraplary gatnaşyp bilerler: suratkeşlik, dizaýnerçilik, sanly tehnologiýalar, şeýle heme&nbsp;ýörite çeperçilik mekdepleriniň we çeperçilik akademiýasynyň talyplary, raýatlar.</p><p style="text-align:justify;">4.2. “Türkmenistanda öndürilen” Milli haryt nyşanyny döretmek boýunça bäsleşige gatnaşmak üçin, bäsleşige gatnaşyjylar aşakdakylary hödürlemeli:</p><p style="text-align:justify;">1) Logotip – Türkmenistanyň halkara bazarlarda tanymallygyny ýokarlandyrmak üçin ulanyljak grafiki nyşan. Logotip jpeg, png, giff formatynda, 1000x1000 px ölçeginde görkezilmeli.</p><p style="text-align:justify;">2) Sarp edijileriň ünsüni çekmek üçin Milli nyşan mahabat gatnaşyklarynyň ähli görnüşlerinde ulanylýan habary gysgaldylan görnüşde geçirýän “Türkmenistanda öndürilen” şygaryny özünde jemlemeli.&nbsp;</p><p style="text-align:justify;">3) Milli nyşan boýunça konsepsiýa erkin görnüşinde beýan edilip, döwlet dilinde taýýarlanmaly we hödürlenmeli. Milli nyşanyny dürli önümleriň (şol sanda sowgatlyk ruçkalaryň, açara dakylýanlaryň, trikotaž we sport eşikleriniň, başgaplarynyň we ş.m.) ýüzlerinde şekillendirmegiň mysallaryny öz içine alýan albom görnüşinde, şeýle-de mahabat şitleriniň taslamalary, web-saýtlar üçin bannerler we beýleki mahabat önümleri görnüşinde şekilleriniň hödürlenmegi makullanýar. Mundan başga-da, konsepsiýada işiň merkezi pikirini beýan etmek, logotipleriň esasy nukdaýnazarlary boýunça düşündirişleri bermek maksada laýyk hasap edilýär.</p><p style="text-align:justify;"><strong>5. Bäsleşigiň ýeňijisini kesgitlemegiň tertibi</strong></p><p style="text-align:justify;">5.1. Dalaşgärleriň işleri olaryň özleri tarapyndan Bilermenler geňeşiniň öňünde tanyşdyrmalar arkaly hödürlenýär.</p><p style="text-align:justify;">5.2. Bilermenler geňeşi işlere seredýär we olara baha berýär. Bäsleşige gatnaşyjylaryň arasynda aşakdaky ölçütler boýunça iň netijeli iş kesgitlenýär:</p><p style="text-align:justify;">1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pikiriň üýtgeşikligi we täzeçilligi</p><p style="text-align:justify;">2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aňsat kabul edilişi we ýatda galýanlygy</p><p style="text-align:justify;">3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Milli aýratynlyklaryň (milli medeniýetiň, däp-dessurlaryň, ykdysadyýetiň, syýahatçylygyň gymmatlyklarynyň) şöhlelendirilmegi</p><p style="text-align:justify;">4)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Çeper keşbiniň bütewiligi</p><p style="text-align:justify;">5)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ýerine ýetirilen işiň hili we estetikasy</p><p style="text-align:justify;">6)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ýerine ýetiriliş tehnikasynyň özboluşlylygy we çeper usullaryň ulanylmagy</p><p style="text-align:justify;">8)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Özüne çekijiligi</p><p style="text-align:justify;">9)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ýurduň innowasion ösüşe ymtylyşynyň beýany</p><p style="text-align:justify;">11)&nbsp;&nbsp;&nbsp; Ulanyş taýdan netijeliligi</p><p style="text-align:justify;">5.3. Işlere baha bermegiň netijeleri boýunça Bilermenler geňeşi bäsleşigiň ýeňijisini kesgitleýär.</p><p style="text-align:justify;">Bäsleşigiň ýeňijisi Diplom we gymmat bahaly sowgat bilen sylaglanýar.</p><p style="text-align:justify;"><strong>6. Awtorlyk hukuklary</strong></p><p style="text-align:justify;">Bäsleşige gatnaşýan işiň awtorlyk hukuklarynyň berjaý edilmegi üçin degişli dalaşgäriň özi jogapkärçiligi çekýär.</p><p style="text-align:justify;">Bäsleşige gatnaşmak bilen, dalaşgär hödürlenen maglumatlary ulanmak babatyndaky hukugyny bäsleşigi guraýjylara geçirýär.</p><p style="text-align:justify;">Bäsleşige iberilin işler yzyna gaýtarylmaýar.&nbsp;</p>
                        <p></p>
                    </div>
                @endif
            </div><!-- /.row -->
        </div>

    </section>

@endsection
