nlsdir       = /var/www/CDRTool/po/locale

top_builddir = /var/www/CDRTool

CATALOGS = ro.mo nl.mo es.mo de.mo

.SUFFIXES: .po .mo

POTFILES  = \
	$(top_builddir)/library/sip_settings.php \
	/etc/cdrtool/local/sip_settings.php \
	$(top_builddir)/library/cc_processor.php \
	$(top_builddir)/ccp_java.js
.po.mo: 
	msgfmt -o $@ $<


all: $(CATALOGS)


clean:
	rm -f $(CATALOGS) cdrtool.pot *~


cdrtool.pot: $(POTFILES) Makefile
	xgettext --language=PHP --default-domain=cdrtool \
	--add-comments --keyword=_ $(POTFILES)
	if cmp -s cdrtool.po cdrtool.pot; then \
	    rm -f cdrtool.po; \
	else \
	    mv -f cdrtool.po cdrtool.pot; \
	fi

install:  $(CATALOGS)
	mkdir -p $(DESTDIR)$(nlsdir)
	chmod 755 $(DESTDIR)$(nlsdir) 
	for n in $(CATALOGS) __DuMmY ; do \
		if test "$$n" -a "$$n" != "__DuMmY" ; then \
			l=`basename $$n .mo`; \
			mkdir -p $(DESTDIR)$(nlsdir)/$$l/LC_MESSAGES; \
			chmod 755 $(DESTDIR)$(nlsdir)/$$l; \
			chmod 755 $(DESTDIR)$(nlsdir)/$$l/LC_MESSAGES; \
			install -m 644 $$n $(DESTDIR)$(nlsdir)/$$l/LC_MESSAGES/cdrtool.mo; \
		fi; \
	done
