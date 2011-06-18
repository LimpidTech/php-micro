build_path = build
logs_path = ${build_path}/logs
conf_path = conf

quality = ${conf_path}/phpmd.xml
quality_out = ${logs_path}/pmd.xml

all: ${quality}

# Generates output regarding code quality assurance
${quality}: init_build
	@@phpmd . xml ${quality} --reportfile ${quality_out}

# Sets up various build paths
init_build: ${build_path} ${logs_path}

${build_path} $(logs_path):
	@@mkdir -p $@

# Cleans up any files that we might have lying around from previous builds.
clean:
	@@rm -rf ${build_path}
	@@rm -rf ${logs_path}

.PHONY: all clean build

