CourseDatabase
==============
## Datenbanken in Veranstaltungen

Wozu kann man in Veranstaltungen Datenbanken nutzen? Ist das nicht furchtbar kompliziert?

Ja, Datenbanken sind kompliziert. Aber sie sind auch ein ungeheuer nützliches Allzweckwerkzeug. Wannimmer man eine Excel-Tabelle öffnet, um Daten zu sammeln, macht man im Grunde schon etwas falsch und wäre besser mit einer kleinen Datenbank bedient. Spätestens, wenn man die zweite Exceltabelle im selben Dokument öffnet, stellt man fest, dass man auf Probleme stößt; oft muss man dann Daten redundant mehrfach eingeben, verhaspelt sich und bekommt am Ende Fehler in dem Datenbestand. Dabei ist Excel gar nicht für Datenbestände gemacht sondern für Berechnungen.

Eine Datenbank hat dagegen viele Vorteile. Man kann in verschiedenen Tabellen einheitliche IDs verwenden, die sich auch gegenseitig referenzieren. Dadurch bekommt man Sicherheit in den Daten. Und am Ende kann man sich aus allen Tabellen einen View zusammen stellen, der einem auf einen Blick alle Informationen gibt, die man braucht. Dann noch einmal diese Daten exportiert und voila, man hat, was man will.

Das schöne an diesem Modul für Stud.IP ist, dass die Datenbank über jeden Webbrowser verfügbar ist und man die Datenbanken flexibel freigeben kann für alle Teilnehmer einer Veranstaltung oder nur bestimmten Teilnehmern oder niemandem außer Ihnen selbst. Das Werkzeug ist also kollaborativ. Sie müssen sich keine Gedanken machen um das Zusammenführen von Daten (passiert ja im Server automatisch) oder ein Backup der Daten (das sollte auch automatisch auf dem Server geschehen).

## Use case 1: Notenvergabe

Sie haben eine Veranstaltung mit drei Übungsgruppen, die jede von einem Tutor/HiWi gehalten wird. Die Tutoren sollen eine Anwesenheitsliste führen ihrer Studenten. Zudem werden jede Woche Punkte für Übungszettel vergeben, die die Studenten lösen mussten, und jeder Student muss einmal pro Semester an der Tafel eine Aufgabe vorrechnen. Ach ja, und während des Semesters soll es noch zwei Klausuren geben, aus denen dann eine Gesamtnote berechnet wird.

Im Normalfall bräuchte man dazu ein komplexes Modul oder man stell mehrere Excel-Dokumente in eine Dropbox, die Sie Ihren Tutoren frei geben. Wuarg! Sie können aber auch eine Datenbank erstellen, die nur Sie und Ihre Tutoren sehen und bearbeiten dürfen. Da gibt es dann drei Tabellen: Anwesenheitsliste, Tafelrechnen und Klausurnoten. Sie weisen Ihre Tutoren an, jede Woche einmal die Anwesenheitsliste und die Tafelliste zu aktualisieren. Dazu erstellen Sie ein View, die Ihnen ausgibt, welche Studenten dreimal oder mehr gefehlt haben und wer noch nicht vorgerechnet hat. So sind Sie immer auf dem Laufenden. Ihre Klausurergebnisse können Sie hier ebenfalls eingeben und bekommen in einem weiteren View die Endnote berechnet.

Views kann man also neben den Tabellen erstellen, um aus den Tabellen bestimmte Informationen zu destillieren wie die Endnote.

## Use case 2: Statistische Umfragen

In einem Kurs werden in Arbeitsgruppen statistische Umfragen entworfen, durchgeführt und ausgewertet.

Sie können Ihren Studenten dabei helfen, indem Sie pro Arbeitsgruppe eine Datenbank anlegen, die dann nur diese Arbeitsgruppe (und Sie als Dozent) sehen und bearbeiten darf. Dort sollen die Mitglieder der Gruppe dann die erhobenen Daten eingeben. Das schöne ist, dass jeder Student selbstständig die Befragungen durchführen und die Daten eingeben kann. Man braucht zum Eingeben dann nur einen Webbrowser. Die Daten sind anschließend zentral gespeichert und können entweder in einem View ausgewertet werden oder exportiert werden, um sie in SPSS weiter auszuwerten.

## Use case 3: Ressourcenmanagement

An Ihrer Uni gibt es eine Stelle, die den Studenten Videokameras und Videoschnittwerkzeuge ausleiht. Es müssen dazu Listen geführt werden, was gerade ausgliehen ist, wo es sich derzeitig befinden und wann es danach wieder ausgeliehen sein wird. Dazu kann in einer Veranstaltung in Stud.IP eine Datenbank erstellt werden, in der jedes Equipment erfasst und jeder Verleihvorgang protokolliert bzw. vorgemerkt wird. Das kann dezentral geschehen, die Mitarbeiter der Einrichtung können auch Vormerkungen erledigen, wenn sie nicht im Büro sind.

