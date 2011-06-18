build_path = build
logs_path = ${build_path}/logs
conf_path = conf
source_path = src

quality = ${conf_path}/phpmd.xml
quality_out = ${logs_path}/pmd.xml

standards_out = ${logs_path}/checkstyle.xml

all: ${quality_out} ${standards_out}

# Generates output regarding code quality assurance
${quality}: init_build
	@@phpmd ${source_path} xml ${quality} --reportfile ${quality_out}

# Generates reports on issues regarding PHP standard code-style
${standards_out}: init_build
	@@phpcs --report=checkstyle --extensions=php --tab-width=4 \
	        --report-width=79 --standard=PEAR \
	        ${source_path} > ${standards_out}

# Sets up various build paths
init_build: ${build_path} ${logs_path}

${build_path} $(logs_path):
	@@mkdir -p $@

# Cleans up any files that we might have lying around from previous builds.
clean:
	@@rm -rf ${build_path}
	@@rm -rf ${logs_path}

.PHONY: all clean init_build

