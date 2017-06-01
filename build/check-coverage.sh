#!/usr/bin/env bash
set -e

function fail {
    echo "${1}"
    exit 1
}

function echo_coverage {
    echo "${DELTA:0:4}% (было - ${MASTER_COVERAGE:0:4}%)"
}

CURRENT_FILE="$1"
MASTER_FILE="$2"

(test -z ${MASTER_FILE} || test -z ${CURRENT_FILE}) \
    && fail "[MIN_COVERAGE=] ${0} PATH_TO_CURRENT_COVERAGE_REPORT PATH_TO_MASTER_COVERAGE_REPORT"

(test -f ${MASTER_FILE} && test -f ${CURRENT_FILE}) \
    || fail "Provide only files as arguments"

CURRENT_COVERAGE=`bc -l <<< \
 "$(xmllint --xpath 'string(/coverage/project/metrics/@coveredstatements)' ${CURRENT_FILE}) \
 / $(xmllint --xpath 'string(/coverage/project/metrics/@statements)' ${CURRENT_FILE}) * 100"`

MASTER_COVERAGE=`bc -l <<< \
 "$(xmllint --xpath 'string(/coverage/project/metrics/@coveredstatements)' ${MASTER_FILE}) \
 / $(xmllint --xpath 'string(/coverage/project/metrics/@statements)' ${MASTER_FILE}) * 100"`

(test -z ${MASTER_COVERAGE} || test -z ${CURRENT_COVERAGE}) \
    && fail "Files should contain coverage in clover format"

DELTA=`bc -l <<< "${CURRENT_COVERAGE} - ${MASTER_COVERAGE}"`

test $(bc -l <<< "${DELTA} < 0") -eq 1 \
    && DELTA=`bc -l <<< "${DELTA} * -1"` \
    && fail "Покрытие кода упало на $(echo_coverage)"

echo "Покрытие кода возросло на $(echo_coverage)"

test ! -z ${MIN_COVERAGE} \
    && test $(bc -l <<< "${MIN_COVERAGE} > $CURRENT_COVERAGE") -eq 1 \
    && fail "Текущее покрытие кода: ${CURRENT_COVERAGE:0:4}% MIN: ${MIN_COVERAGE:0:4}%"

exit 0
