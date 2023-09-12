libfastroute.so:
	./bpc-prepare.sh src.list
	$(MAKE) -C ./FastRoute libfastroute

libfastroute:
	bpc -v \
		-c bpc.conf  \
		-l fastroute \
		--input-file src.list

install-libfastroute:
	cd FastRoute && bpc -l fastroute --install
