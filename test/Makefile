test:
	./bpc-prepare.sh src.list
	$(MAKE) -C ./bpc-test test-bin
	mv ./bpc-test/test .

test-bin:
	bpc -v \
	    -c ../../src/bpc.conf \
	    -o test \
	    -u phpunit \
	    -u fastroute \
	    -d display_errors=on \
	    run-test.php \
	    --input-file src.list
