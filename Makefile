TITLE = [presenter]

test:
	@/bin/echo -e "${TITLE} testing suite started..." \
	&& vendor/bin/phpunit -c test/phpunit.xml

.PHONY: test