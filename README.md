CourseDatabase
==============
## Datenbanken in Veranstaltungen

Wozu kann man in Veranstaltungen Datenbanken nutzen? Ist das nicht furchtbar kompliziert?

Ja, Datenbanken sind kompliziert. Aber sie sind auch ein ungeheuer n�tzliches Allzweckwerkzeug. Wannimmer man eine Excel-Tabelle �ffnet, um Daten zu sammeln, macht man im Grunde schon etwas falsch und w�re besser mit einer kleinen Datenbank bedient. Sp�testens, wenn man die zweite Exceltabelle im selben Dokument �ffnet, stellt man fest, dass man auf Probleme st��t; oft muss man dann Daten redundant mehrfach eingeben, verhaspelt sich und bekommt am Ende Fehler in dem Datenbestand. Dabei ist Excel gar nicht f�r Datenbest�nde gemacht sondern f�r Berechnungen.

Eine Datenbank hat dagegen viele Vorteile. Man kann in verschiedenen Tabellen einheitliche IDs verwenden, die sich auch gegenseitig referenzieren. Dadurch bekommt man Sicherheit in den Daten. Und am Ende kann man sich aus allen Tabellen einen View zusammen stellen, der einem auf einen Blick alle Informationen gibt, die man braucht. Dann noch einmal diese Daten exportiert und voila, man hat, was man will.

Das sch�ne an diesem Modul f�r Stud.IP ist, dass die Datenbank �ber jeden Webbrowser verf�gbar ist und man die Datenbanken flexibel freigeben kann f�r alle Teilnehmer einer Veranstaltung oder nur bestimmten Teilnehmern oder niemandem au�er Ihnen selbst. Das Werkzeug ist also kollaborativ. Sie m�ssen sich keine Gedanken machen um das Zusammenf�hren von Daten (passiert ja im Server automatisch) oder ein Backup der Daten (das sollte auch automatisch auf dem Server geschehen).

## Use case 1: Notenvergabe

Sie haben eine Veranstaltung mit drei �bungsgruppen, die jede von einem Tutor/HiWi gehalten wird. Die Tutoren sollen eine Anwesenheitsliste f�hren ihrer Studenten. Zudem werden jede Woche Punkte f�r �bungszettel vergeben, die die Studenten l�sen mussten, und jeder Student muss einmal pro Semester an der Tafel eine Aufgabe vorrechnen. Ach ja, und w�hrend des Semesters soll es noch zwei Klausuren geben, aus denen dann eine Gesamtnote berechnet wird.

Im Normalfall br�uchte man dazu ein komplexes Modul oder man stell mehrere Excel-Dokumente in eine Dropbox, die Sie Ihren Tutoren frei geben. Wuarg! Sie k�nnen aber auch eine Datenbank erstellen, die nur Sie und Ihre Tutoren sehen und bearbeiten d�rfen. Da gibt es dann drei Tabellen: Anwesenheitsliste, Tafelrechnen und Klausurnoten. Sie weisen Ihre Tutoren an, jede Woche einmal die Anwesenheitsliste und die Tafelliste zu aktualisieren. Dazu erstellen Sie ein View, die Ihnen ausgibt, welche Studenten dreimal oder mehr gefehlt haben und wer noch nicht vorgerechnet hat. So sind Sie immer auf dem Laufenden. Ihre Klausurergebnisse k�nnen Sie hier ebenfalls eingeben und bekommen in einem weiteren View die Endnote berechnet.

Views kann man also neben den Tabellen erstellen, um aus den Tabellen bestimmte Informationen zu destillieren wie die Endnote.

## Use case 2: Statistische Umfragen

In einem Kurs werden in Arbeitsgruppen statistische Umfragen entworfen, durchgef�hrt und ausgewertet.

Sie k�nnen Ihren Studenten dabei helfen, indem Sie pro Arbeitsgruppe eine Datenbank anlegen, die dann nur diese Arbeitsgruppe (und Sie als Dozent) sehen und bearbeiten darf. Dort sollen die Mitglieder der Gruppe dann die erhobenen Daten eingeben. Das sch�ne ist, dass jeder Student selbstst�ndig die Befragungen durchf�hren und die Daten eingeben kann. Man braucht zum Eingeben dann nur einen Webbrowser. Die Daten sind anschlie�end zentral gespeichert und k�nnen entweder in einem View ausgewertet werden oder exportiert werden, um sie in SPSS weiter auszuwerten.

## Use case 3: Ressourcenmanagement

An Ihrer Uni gibt es eine Stelle, die den Studenten Videokameras und Videoschnittwerkzeuge ausleiht. Es m�ssen dazu Listen gef�hrt werden, was gerade ausgliehen ist, wo es sich derzeitig befinden und wann es danach wieder ausgeliehen sein wird. Dazu kann in einer Veranstaltung in Stud.IP eine Datenbank erstellt werden, in der jedes Equipment erfasst und jeder Verleihvorgang protokolliert bzw. vorgemerkt wird. Das kann dezentral geschehen, die Mitarbeiter der Einrichtung k�nnen auch Vormerkungen erledigen, wenn sie nicht im B�ro sind.

